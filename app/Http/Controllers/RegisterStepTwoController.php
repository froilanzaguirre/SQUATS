<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterStepTwoController extends Controller
{
    public function create()
    {
        return view('auth.register-step2');

        // Validator::make($input, [
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        // return User::create([
        //     'fname' => $input['fname'],
        //     'mname' => $input['mname'],
        //     'lname' => $input['lname'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        //     'usertype' => $input['usertype'],
        //     'suffix' => $input['suffix'],
        //     'civilStatus' => $input['civilStatus'],
        //     'gender' => $input['gender'],
        //     'birthDate' => $input['birthDate'],
        //     'contactNumber' => $input['contactNumber'],
        //     'province' => $input['province'],
        //     'city' => $input['city'],
        //     'barangay' => $input['barangay'],
        //     'unit' => $input['unit'],
        //     'floor' => $input['floor'],
        //     'buildingName' => $input['buildingName'],
        //     'houseNo' => $input['houseNo'],
        //     'streetName' => $input['streetName'],
        //     'district' => $input['district'],
        // ]);
    }
    
    public function store(Request $request)
    {
        auth()->user()->update([
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'unit' => $request->unit,
            'floor' => $request->floor,
            'buildingName' => $request->buildingName,
            'houseNo' => $request->houseNo,
            'streetName' => $request->streetName,
            'district' => $request->district,
        ]);

        return redirect()->route('register-step3.create');
    }
}
