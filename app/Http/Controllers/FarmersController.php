<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Farmer;
use Session;

class FarmersController extends Controller
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
        $areas=Area::orderBy('district', 'ASC')->get();
        $farmers=Farmer::orderBy('areaId', 'ASC')->get();
        return view('farmers.index')->withAreas($areas)->withFarmers($farmers);
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
            'areaId' => 'required',
            'name' => 'required|max:255',
            'nid' => 'required|numeric|digits:8|unique:farmers|unique:users',
        ));

        $farmer=new Farmer();
        $farmer->areaId=$request->areaId;
        $farmer->name=ucwords($request->name);
        $farmer->nid=(int)$request->nid;
        $farmer->save();

        Session::flash('createFarmerSuccess', 'Farmer <b>'.$request->name.'</b> added.');
        return redirect()->route('farmers.index');
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
