<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VaccineInfoController extends Controller
{
    public function show($userid){
        $user = User::find($userid);
        return view('profile.vaccineinfo', compact('user'));
    }
}
