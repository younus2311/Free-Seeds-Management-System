<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use DB;
use App\Distribution;
use Auth;
use Session;
use App\Seed;

class OrdersForDealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\DealerMiddleware');
    }

    public function index()
    {
        $orders=DB::table('orders')
                    ->join('distributions', 'orders.distributionId', '=', 'distributions.id')
                    ->join('farmers', 'distributions.farmerId', '=', 'farmers.id')
                    ->join('seeds', 'distributions.seedId', '=', 'seeds.id')
                    ->where('orders.dealerId', Auth::user()->id)
                    ->select('orders.id as orderId', 'orders.status', 'distributions.id as distributionId', 'distributions.farmerId', 'distributions.seedId', 'distributions.requiredQuantity', 'farmers.name', 'seeds.seed')
                    ->get();
        return view('orders.index')->withOrders($orders);
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
        $this->validate($request, array(
            'orderId' => 'required',
            'distributionId' => 'required',
            'requiredQuantity' => 'required'
        ));

        $order=Order::find($request->orderId);
        $order->status=1;
        $order->save();

        $dist=Distribution::find($request->distributionId);
        $seed=Seed::find($dist->seedId);

        $seed->quantity=(int)$seed->quantity;
        $request->requiredQuantity=(int)$request->requiredQuantity;
        $seed->quantity=$seed->quantity-$request->requiredQuantity;
        $seed->save();

        Session::flash('orderConfirmed', 'Order Confirmed!');
        return redirect()->route('orders.index');
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
        //
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
