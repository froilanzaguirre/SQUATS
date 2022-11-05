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
            request()->file('vaccine')->storeAs('\vaccines' . '\user.' . $user->id . '\vaccine.' . $vaccine, '');
            $user->update(['vaccine' => ('\vaccines' . '\user.' . $user->id . '\vaccine.' . $vaccine)]);
        }
        
        return redirect()->route('dashboard');
    }
}

        
        