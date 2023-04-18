<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        try{
            $purchases = Order::orderByDesc('id')->where('status', 'completed')->get();
            return view('admin.purchase.index', compact('purchases'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function publications($id)
    {
        try{
            $order = Order::findOrFail($id);
            if ($order){
                return view('admin.purchase.publications', compact('order'));
            }
            return redirect()->back()->withErrors('Ýalňyş URL');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
