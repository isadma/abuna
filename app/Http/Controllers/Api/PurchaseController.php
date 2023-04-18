<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Order;
use App\OrderPeriod;
use App\OrderPublication;
use App\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase(PurchaseRequest $request){
        try{
            $order = Order::create(['user_id' => Auth::id()]);
            $totalPrice = 0;
            foreach($request->all() as $item){
                $orderPublication = OrderPublication::create([
                    'order_id' => $order->id,
                    'publication_id' => $item['publicationId'],
                    'address_id' => $item['streetId'],
                    'name' => $item['name'],
                    'surname' => $item['surname'],
                    'quantity' => $item['quantity'],
                    'block' => $item['block'],
                    'house' => $item['house'],
                    'home' => $item['home'],
                ]);
                foreach($item["months"] as $periodId){
                    $period = Period::findOrFail($periodId);
                    if ($period){
                        $totalPrice = $totalPrice + $period->price;
                        OrderPeriod::create([
                            'order_publication_id' => $orderPublication->id,
                            'period_id' => $periodId,
                            'price' => $period->price,
                        ]);
                    }
                }
            }

            $payment = Order::paymentGenerate([
                'id' => $order->id,
                'amount' => $totalPrice,
            ]);

            if ($payment->success) {
                $order->update([
                    'payment_id' => $payment->data->orderId,
                    'status' => 'created'
                ]);
            }
            else {
                return response()->json([
                    'status' => 0,
                    'message' => $payment->message
                ], 500);
            }

            return response()->json([
                'status' => 1,
                'data' => $payment->data
            ], 201);
        }
        catch (\Exception $e){
            if ($order){
                $order->delete();
            }
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage(),
            ], 500);
        }

    }
}
