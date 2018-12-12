<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Area;
use Session;

class AreasController extends Controller
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
        $distributors=User::where('type', 'distributor')->get();
        $areas=Area::orderBy('id', 'DESC')->get();
        return view('areas.index')->withDistributors($distributors)->withAreas($areas);
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
            'district' => 'required',
            'area' => 'required|unique:areas',
            'distributorId' => 'required'
        ));

        $area=new Area();
        $area->district=ucwords($request->district);
        $area->area=ucwords($request->area);
        $area->distributorId=$request->distributorId;
        $area->save();

        $user=User::find($request->distributorId);

        $message="<li>District: <b>".ucwords($request->district)."</b> & Area: <b>".ucwords($request->area)."</b> created.</li>";
        $message.="<li>Area in charge assigned: <b>".$user->name."</b>.</li>";

        Session::flash('createAreaSuccess', $message);
        return redirect()->route('areas.index');
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
