<?php

namespace App\Http\Controllers\Site;

use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data['order_details'] = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'products.name as product_name', 'users.name')
            ->get();

        //return $users;
        // $fruits = [];
        // $data = Order::get();

        // foreach ($data as $product_id) {
        //     $value = $product_id->product_id;
        //     $product = explode(',', $value);
        //     foreach ($product as $a) {
        //         $a = intval($a);
        //         $users = DB::table('products')
        //             ->where('products.id', '=', $a)
        //             ->select('products.name', 'products.id')
        //             ->get();

        //         // array_push() function inserts one or more elements to the end of an array
        //         array_push($fruits, $users);
        //     }
        // }


        //return $fruits;
        // return compact($data=array(),$fruits=array();






        return view('admin.orders.index', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(implode(',', $request->product_id));
        $totalproduct = count($request->product_id);
        //return $totalproduct;
        for ($i = 0; $i < intval($totalproduct); $i++) {
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->phn_no = $request->phonenumber;
            $order->shipping_address = $request->shippingAddress;

            $order->product_id =  $request->product_id[$i];
            $order->quantity =  $request->quantity[$i];

            $order->total_product = $request->count;
            $order->subtotal_price = $request->subtotal;
            $order->shipping_price = $request->shipping_price;
            $order->total_price = $request->total;
            $order->tax = $request->tax;
            $order->payment_status = $request->payment_method;
            $order->save();
        }
        flash('Order Successful ')->success();

        // flash('Order Successful ')->success();
        // foreach ($request->product_id as $item) {

        //     $order->product_id = implode(',', $item);
        //     $order->save();
        // }


        return redirect("/checkout");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $affected = DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
