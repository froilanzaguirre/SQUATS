<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class RegisterStepThreeController extends Controller
{
    public function create()
    {
        return view('auth.register-step3');
    }
    
    public function store(Request $request, User $user)
    {
        auth()->user()->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contactNumber' => $request->contactNumber,
            'vaccine' => $request->vaccine,
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            request()->file('vaccine')->storeAs('vaccines', $user->id . '/' . $vaccine, '');
            $user->update(['vaccine' => $vaccine]);
        }
        
        return redirect()->route('dashboard');
    }
}



        // Validator::make($input, [
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        // return User::create([
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        //     'contactNumber' => $input['contactNumber'],
        // ]);
        
        
        
        