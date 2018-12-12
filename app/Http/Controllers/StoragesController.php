<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Storage;
use Session;

class StoragesController extends Controller
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
        $storages=Storage::orderBy('id', 'DESC')->get();
        return view('storages.index')->withDistributors($distributors)->withStorages($storages);
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
            'distributorId' => 'required',
            'name' => 'required|unique:storages',
            'description' => 'required'
        ));

        $storage=new Storage();
        $storage->distributorId=$request->distributorId;
        $storage->name=ucwords($request->name);
        $storage->description=ucfirst($request->description);
        $storage->save();

        $user=User::find($request->distributorId);

        $message="<li>Storage: <b>".ucwords($request->name)."</b> created.</li>";
        $message.="<li>Storage in charge assigned: <b>".$user->name."</b>.</li>";

        Session::flash('createStorageSuccess', $message);
        return redirect()->route('storages.index');
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
