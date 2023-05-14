<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\LogInformation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LogInformationController extends Controller
{
    public function show(Request $request)
    {
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $datenow = Carbon::now('GMT+8')->format('m-d-Y');
                $search = "$datenow";
                $search = $request->search;

                $loginformationall = LogInformation::all();

                $loginformation = LogInformation::where('dayin', $datenow)
                ->paginate(10);

                // $loginformation = DB::select('SELECT * FROM `log_information` WHERE dayin = "' . $datenow . '" ORDER BY `timein` DESC');

                return view('admin.loginformation', compact('loginformation', 'loginformationall', 'search'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function search(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){

                $datenow = Carbon::now('GMT+8')->format('m-d-Y');
                $search = "$datenow";
                $search = $request->search;

                if ($search != NULL) {
                    $loginformation = LogInformation::where('dayin', 'LIKE', '%' . $search .'%')
                    ->orWhere('name', 'LIKE', '%' . $search .'%')
                    ->orWhere('roomToVisit', 'LIKE', '%' . $search .'%')
                    ->orWhere('nameToVisit', 'LIKE', '%' . $search .'%')
                    ->orWhere('timein', 'LIKE', '%' . $search .'%')
                    ->orWhere('usertype', 'LIKE', '%' . $search .'%')
                    ->paginate(10);
                } else {
                    $loginformation = LogInformation::where('dayin', 'LIKE', '%' . $datenow .'%')->paginate(10);
                }

                // $loginformation = DB::select('SELECT * FROM `log_information` WHERE dayin = "' . $datenow . '" ORDER BY `timein` DESC');

                return view('admin.loginformation', compact('loginformation', 'search'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function showalllogs(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $datenow = Carbon::now('GMT+8')->format('m-d-Y');
                $search = "$datenow";
                $search = $request->search;

                $loginformation = LogInformation::paginate(15);

                // $loginformation = DB::select('SELECT * FROM `log_information` WHERE dayin = "' . $datenow . '" ORDER BY `timein` DESC');

                return view('admin.loginformation', compact('loginformation', 'search'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }



}
