<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogInformation;

class ScannerController extends Controller
{
    public function storeLogInfo($id){
        $user = User::find($id);
        $loginformation = new LogInformation();
        $loginformation->userid = $user->id;
        $loginformation->name = $user->fname . " " . $user->mname. " " . $user->lname;
        $loginformation->gender = $user->gender;
        $loginformation->contactNumber = $user->contactNumber;
        $loginformation->dateOfVisit = $user->dateOfVisit;
        $loginformation->purposeOfVisit = $user->purposeOfVisit;

        $loginformation->save();
        return redirect()->route('userQR');
    }
}
