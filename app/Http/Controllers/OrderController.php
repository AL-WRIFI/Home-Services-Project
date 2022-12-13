<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request['order_status'] = $request['order_status'] ?? 'pending';

        $query_param = [];

        if($request->has('search')){
            $search = $request['search'];
            $query_param['search'] = $search;
        }

        if($request->has('order_status')){
            $order_status = $request['order_status'];
            $query_param['order_status'] = $order_status;
        }else{
            $query_param['order_status'] = 'pending';
        }

        //$order = new Order;

        $orders =Order::with(['user','provider'])
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where(
                    function ($query) use ($request) {

                            $keys = explode(' ', $request['search']);
                            foreach ($keys as $key) {
                                $query->orWhere('id', 'LIKE', '%' . $key . '%');
                            }

                        }
                );
            })->when($order_status != 'all', function ($query) use ($order_status) {
            $query->Order_status($order_status);
        })->paginate();

        return view('admin.Order.list', compact('orders', 'query_param'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
