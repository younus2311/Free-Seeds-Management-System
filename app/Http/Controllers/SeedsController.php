<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Storage;
use App\Seed;
use App\User;
use Session;

class SeedsController extends Controller
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
        $storages=Storage::all();
        $seeds=Seed::orderBy('storageId', 'ASC')->get();
        return view('seeds.index')->withStorages($storages)->withSeeds($seeds);
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
            'storageId' => 'required',
            'seed' => 'required|unique_with:seeds,storageId', //By FelixKiss UniqueWith Validator plugin
            'quantity' => 'required|numeric'
        ));

        $seed=new Seed();
        $seed->storageId=$request->storageId;
        $seed->seed=ucwords($request->seed);
        $seed->quantity=(int)$request->quantity;
        $seed->save();

        $storage=Storage::find($request->storageId);
        $user=User::find($storage->distributorId);

        $message="<li><b>".$seed->quantity."kg</b> <b>".ucwords($request->seed)."</b> added to <b>".$storage->name."</b>.</li>";
        $message.="<li>Storage in charge: <b>".$user->name."</b>.</li>";

        Session::flash('createSeedSuccess', $message);
        return redirect()->route('seeds.index');
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
