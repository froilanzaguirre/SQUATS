<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\LogInformation;
use App\Models\ExpectedVisitor;
use Illuminate\Http\Request;
use Carbon\Carbon;

//cooldown
class ScannerController extends Controller
{
    public function show(){
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin" || Auth::user()->usertype == "Staff"){
                $lastentered = DB::table('log_information')->latest()->first();
                $isOpenTimeout = false;
                $isOpenNotScanned = false;

                return view('admin.qrCodeScanner', [
                    'info' => $lastentered,
                    'isOpenTimeout' => $isOpenTimeout,
                    'isOpenNotScanned' => $isOpenNotScanned,
                ]);
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function timeout($id){
        $loginformation = LogInformation::find($id);
        $loginformation->timeout = Carbon::now('GMT+8')->format('H:i');
        $loginformation->frequenttimeout = Carbon::now('GMT+8')->format('H');
        $loginformation->save();

        return redirect()->route('loginformation')->with('loggedout', '');
    }

    public function storeLogInfo($id){
        $user = User::find($id);
        $loginformation = Loginformation::where('userid', $id)->latest()->first();
        $daynow = Carbon::now('GMT+8')->format('m-d-Y');
        $timenow = Carbon::now('GMT+8')->format('h:iA');

        //for curfew prevent visitor to scan
        if($user != NULL){
            if ((Carbon::now('GMT+8')->format('H') >= 22) && ($user->usertype == 'Visitor')){
                return redirect()->route('scanQR')->with('notscanned', '');
            } else {
                if (($loginformation == NULL) || (($user->id == $loginformation->userid) && ($daynow != $loginformation->dayin))){
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
                    $loginformation->dayin = Carbon::now('GMT+8')->format('m-d-Y');
                    $loginformation->timein = Carbon::now('GMT+8')->format('h:iA');
                    //for getting most frequent hour
                    $loginformation->frequenttimein = Carbon::now('GMT+8')->format('H');
                
                    $loginformation->save();
            
                    $lastentered = DB::table('log_information')->latest()->first();
                    $isOpenTimeout = false;
            
                    return redirect()->route('scanQR', ['name' => $lastentered->name, 'isOpenTimeout' => $isOpenTimeout])->with('scanned', '');
                }
                elseif (($user->id == $loginformation->userid) && ($daynow == $loginformation->dayin) && ($loginformation->timein != $timenow) ){
                    $loginformation = Loginformation::where('userid', $id)->latest()->first();
        
                    $loginformation->timeout = Carbon::now('GMT+8')->format('h:iA');
                    $loginformation->frequenttimeout = Carbon::now('GMT+8')->format('H');
                    $isOpenTimeout = true;
                    $isOpenNotScanned = false;
        
                    $loginformation->save();
                    
                    return view('admin.qrCodeScanner', ['isOpenTimeout' => $isOpenTimeout, 'loginformation' => $loginformation], ['isOpenNotScanned' => $isOpenNotScanned], compact('loginformation'));
                } else {
                    $lastentered = DB::table('log_information')->latest()->first();
                    $isOpenTimeout = false;
            
                    return redirect()->route('scanQR', ['name' => $lastentered->name, 'isOpenTimeout' => $isOpenTimeout])->with('scanned', '');
                }
            }
        } else {
            $isOpenTimeout = false;
            $isOpenNotScanned = true;
            return view('admin.qrCodeScanner', ['isOpenTimeout' => $isOpenTimeout], ['isOpenNotScanned' => $isOpenNotScanned]);
        }
    }
}