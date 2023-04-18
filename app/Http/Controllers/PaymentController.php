<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment($type)
    {

        if ($type === 'success') {
            $paymentId = request('orderId');
            $order = Order::where('payment_id', $paymentId)->first();
            Order::checkPayment($order);
        }

        return view("payment.$type");
    }
}
