<?php

namespace App\Http\Controllers;

use App\Model\Dish;
use Illuminate\Http\Request;
use App\Model\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('', ['dish' => $dish]);
    }
}
