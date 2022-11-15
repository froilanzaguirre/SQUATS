<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            // request()->file('vaccine')->storeAs('vaccines', '\user_' . Auth::user()->id . '\vaccine_' . $vaccine, '');
            request()->file('vaccine')->move('vaccines', '\user_' . Auth::user()->id . '_vaccine_' . $vaccine, '');
            auth()->user()->update(['vaccine' => ('\vaccines' . '\user_' . Auth::user()->id . '_vaccine_' . $vaccine)]);
        }

        return redirect()->route('dashboard');
    }
}


