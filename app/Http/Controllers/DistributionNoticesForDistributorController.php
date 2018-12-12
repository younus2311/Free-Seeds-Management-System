<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmer;
use DB;
use Auth;
use App\Storage;
use App\DealersOfDistributor;
use App\Order;
use Session;
use App\User;

class DistributionNoticesForDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\DistributorMiddleware');
    }

    public function index()
    {
        // $farmers=DB::table('farmers')
        //             ->join('areas', 'farmers.areaId', '=', 'areas.id')
        //             ->join('storages', 'areas.distributorId', '=', 'storages.distributorId')
        //             ->where('storages.distributorId', Auth::user()->id)
        //             ->select('farmers.id as farmerId', 'farmers.name as farmer', 'areas.district', 'areas.area', 'storages.id as storageId', 'storages.name as storage')
        //             ->get();

        $distributions=DB::table('distributions')
                            ->join('farmers', 'distributions.farmerId', '=', 'farmers.id')
                            ->join('areas', 'farmers.areaId', '=', 'areas.id')
                            ->join('seeds', 'distributions.seedId', '=', 'seeds.id')
                            ->where('areas.distributorId', Auth::user()->id)
                            ->select('distributions.id as distributionId', 'distributions.farmerId', 'distributions.seedId', 'distributions.requiredQuantity', 'farmers.*', 'seeds.*')
                            ->get();
        $asd=DealersOfDistributor::where('distributorId', Auth::user()->id)->get();
        $orders=Order::all();

        return view('notices.index')->withDistributions($distributions)->withAsd($asd)->withOrders($orders);
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
            'dealerId' => 'required'
        ));

        $order=new Order();
        $order->distributionId=$request->distributionId;
        $order->distributorId=Auth::user()->id;
        $order->dealerId=$request->dealerId;
        $order->status=0;
        $order->save();

        $user=User::find($request->dealerId);

        Session::flash('orderSent', 'Order sent to <b>'.$user->name.'</b>');
        return redirect()->route('notices.index');
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
