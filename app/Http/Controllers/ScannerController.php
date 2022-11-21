<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LogInformation;
use Carbon\Carbon;

//cooldown
class ScannerController extends Controller
{
    public function show(){

        $lastentered = DB::table('log_information')->latest()->first();

        // if ((Carbon::now('GMT+8')->format('H') >= 20 && Carbon::now('GMT+8')->format('i') > 30) || (Carbon::now('GMT+8')->format('H') >= 20)){
        //     $timenow = Carbon::now('GMT+8')->format('H');
        //     return redirect()->route('scanQR', ['info' => $lastentered])->with('curfewna', '');
        // }

        return view('admin.qrCodeScanner', ['info' => $lastentered]);
    }

    public function timeout($id){
        $loginformation = LogInformation::find($id);
        $loginformation->timeout = Carbon::now('GMT+8')->format('H:i:s');
        $loginformation->frequenttimeout = Carbon::now('GMT+8')->format('H');
        $loginformation->save();

        return redirect()->route('loginformation')->with('loggedout', '');
    }

    public function storeLogInfo($id){
        $user = User::find($id);
        $loginformation = new LogInformation();
        $loginformation->userid = $user->id;
        $loginformation->name = $user->name;
        $loginformation->gender = $user->gender;
        $loginformation->contactNumber = $user->contactNumber;
        $loginformation->dateOfVisit = $user->dateOfVisit;
        $loginformation->purposeOfVisit = $user->purposeOfVisit;
        $loginformation->nameToVisit = $user->nameToVisit;
        $loginformation->roomToVisit = $user->roomToVisit;
        $loginformation->usertype = $user->usertype;
        $loginformation->dayin = Carbon::now()->format('m-d-Y');
        $loginformation->timein = Carbon::now('GMT+8')->format('H:i');
        //for getting most frequent hour
        $loginformation->frequenttimein = Carbon::now('GMT+8')->format('H');

        $loginformation->save();

        $lastentered = DB::table('log_information')->latest()->first();

        return redirect()->route('scanQR', ['name' => $lastentered->name])->with('scanned', '');
    }
}
