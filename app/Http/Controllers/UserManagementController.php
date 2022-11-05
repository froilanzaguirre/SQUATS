<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function show()
    {
        $loginformation = User::all();

        return view('admin.userManagement', compact('loginformation'));
    }

    public function viewUser()
    {

    }
}
