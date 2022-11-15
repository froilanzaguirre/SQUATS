<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LogInformation;

class ScannerController extends Controller
{
    public function show(){
        $lastentered = DB::table('log_information')->latest()->first();

        return view('admin.qrCodeScanner', ['info' => $lastentered]);
    }

    public function timeout($id){
        $loginformation = LogInformation::find($id);
        $loginformation->timeout = $loginformation->updated_at;
        $loginformation->save();
        $loginformation->timeout = $loginformation->updated_at;
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

        $loginformation->save();

        $lastentered = DB::table('log_information')->latest()->first();

        return redirect()->route('scanQR', ['name' => $lastentered->name])->with('scanned', '');
    }
}
