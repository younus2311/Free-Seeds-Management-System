<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Storage;
use App\Seed;
use App\Farmer;
use DB;
use Auth;
use App\DealersOfDistributor;
use App\Area;

class PagesController extends Controller
{
    public function getHomepage()
    {
        if(Auth::check())
        {
        	$distributors=User::where('type', 'distributor')->get();
        	$dealers=User::where('type', 'dealer')->get();
        	// $storages=Storage::orderBy('id', 'DESC')->get();
        	$farmers=Farmer::all();

    		$storages=DB::table('storages')->join('dealers_of_distributors', 'storages.distributorId', '=', 'dealers_of_distributors.distributorId')->select('storages.*', 'dealers_of_distributors.dealerId')->get();

        	// $seeds=Seed::orderBy('storageId', 'DESC')->get();
            $storage=Storage::where('distributorId', Auth::user()->id)->get();
            $asd=DealersOfDistributor::where('distributorId', Auth::user()->id)->get();
            $area=Area::where('distributorId', Auth::user()->id)->get();
            $asf=DB::table('farmers')
                    ->join('areas', 'farmers.areaId', '=', 'areas.id')
                    ->where('areas.distributorId', Auth::user()->id)
                    ->select('farmers.*')
                    ->get();
            $asdst=DealersOfDistributor::where('dealerId', Auth::user()->id)->get();

        	return view('pages.home')->withDistributors($distributors)->withDealers($dealers)->withFarmers($farmers)->withStorage($storage)->withAsd($asd)->withArea($area)->withAsf($asf)->withAsdst($asdst);
        }
        else{
            return view('pages.home');
        }
    }
}
