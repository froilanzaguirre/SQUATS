<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogInformation;

class LogInformationController extends Controller
{

    public function show()
    {
        $loginformation = LogInformation::paginate(5);

        return view('admin.loginformation', compact('loginformation'));
    }
}
