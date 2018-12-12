<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmer;
use DB;
use App\Seed;
use App\Distribution;
use Session;

class DistributionsController extends Controller
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
        $farmers=DB::table('farmers')
                    ->join('areas', 'farmers.areaId', '=', 'areas.id')
                    ->join('storages', 'areas.distributorId', '=', 'storages.distributorId')
                    ->select('farmers.id as farmerId', 'farmers.name as farmer', 'storages.id as storageId', 'storages.name as storage')
                    ->get();
        $seeds=Seed::orderBy('seed', 'ASC')->get();

        $distributions=Distribution::all();

        return view('distributions.index')->withFarmers($farmers)->withSeeds($seeds)->withDistributions($distributions);
        // echo '<pre>';
        // print_r($farmers);
        // echo '</pre>';
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
        $seed=Seed::find($request->seedId);
        $dist=DB::table('distributions')->where('seedId', $request->seedId)->sum('requiredQuantity');

        if(!empty($dist))
            $available=$seed->quantity-$dist;
        else
            $available=$seed->quantity;

        $this->validate($request, array(
            'requiredQuantity' => 'numeric|max:'.$available
        ));

        $distribution=new Distribution();
        $distribution->farmerId=$request->farmerId;
        $distribution->seedId=$request->seedId;
        $distribution->requiredQuantity=(int)$request->requiredQuantity;
        $distribution->save();

        Session::flash('distSuccess', 'Success!');

        return redirect()->route('distributions.index');
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
