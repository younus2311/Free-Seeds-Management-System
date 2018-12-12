<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\DealersOfDistributor;
use Session;

class DealersController extends Controller
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
        $dealers=User::where('type', 'dealer')->get();
        $distributors=User::where('type', 'distributor')->get();
        $assignedDealers=DealersOfDistributor::all();
        return view('dealers.index')->withDealers($dealers)->withDistributors($distributors)->with('assignedDealers', $assignedDealers);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'type' => 'required',
            'nid' => 'required|numeric|digits:8|unique:users',
            'password' => 'required|min:5|confirmed'
        ));

        $user=new User();
        $user->name=ucwords($request->name);
        $user->email=strtolower($request->email);
        $user->type=strtolower($request->type);
        $user->nid=$request->nid;
        $user->password=bcrypt($request->password);
        $user->save();

        Session::flash('createDealerSuccess', '<b>'.ucwords($request->name).'</b> added as a <b>Dealer</b>');
        return redirect()->route('dealers.index');
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
