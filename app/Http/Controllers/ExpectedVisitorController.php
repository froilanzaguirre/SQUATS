<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ExpectedVisitor;

class ExpectedVisitorController extends Controller
{
    public function show()
    {
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $expectedVisitor = ExpectedVisitor::orderBy('id', 'DESC')->paginate(10);
                return view('admin.expectedVisitor', compact('expectedVisitor'));
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