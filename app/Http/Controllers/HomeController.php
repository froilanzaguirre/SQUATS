<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpectedVisitor;

class HomeController extends Controller
{
    public function show(){  
        if (Auth::user()->usertype == "Admin") {
            return redirect()->route('admindashboard');
        } elseif (Auth::user()->usertype == "Staff"){

            // dd($id);
            return redirect()->route('staffresidentlist');
        } else {
            $id = Auth::user()->id;
            $user = User::find($id);
            // dd($id);
            return view('dashboard', compact('user'));
        }
    }

    public function residentVisitorApproval(){
        if(Auth::id()){
            if (Auth::user()->usertype == "Resident"){
                $visitor = ExpectedVisitor::where('nameToVisit', Auth::user()->name)->paginate(5);

                return view('visitorapproval', compact('visitor'));
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