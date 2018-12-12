<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\AdminMiddleware');
    }

    public function index()
    {
        $reports=DB::table('orders')
                    ->join('distributions', 'orders.distributionId', '=', 'distributions.id')
                    ->join('farmers', 'distributions.farmerId', '=', 'farmers.id')
                    ->join('storages', 'orders.distributorId', '=', 'storages.distributorId')
                    ->join('users', 'orders.distributorId', '=', 'users.id')
                    ->join('seeds', 'distributions.seedId', '=', 'seeds.id')
                    ->join('areas', 'orders.distributorId', '=', 'areas.distributorId')
                    ->select('users.name as user', 'storages.name as storage', 'farmers.name as farmer', 'seeds.seed', 'distributions.requiredQuantity', 'orders.status', 'areas.district', 'areas.area')
                    ->orderBy('orders.distributorId', 'ASC')
                    ->get();

        return view('reports.index')->withReports($reports);
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
