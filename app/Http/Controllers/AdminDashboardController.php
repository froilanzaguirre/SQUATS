<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function createAccount(Request $request, User $user)
    {
        $tempemail = str_replace(' ', '', $request->name) . $request->roomNo . '@dorm.com';
        $email = strtolower($tempemail);

        $temppass = str_replace(' ', '', $request->name) . $request->roomNo;
        $password = strtolower($temppass);

        $user = User::create([
            'name' => $request->name,
            'roomToVisit' => $request->roomNo,
            'email' => $email,
            'contactNumber' => $request->contactNumber,
            'purposeOfVisit' => 'Resident',
            'nameToVisit' => $request->name,
            'usertype' => 'Resident',
            'vaccinedose' => $request->vaccinedose,
            'password' => Hash::make($password),
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            // request()->file('vaccine')->storeAs('vaccines', '\user_' . Auth::user()->id . '\vaccine_' . $vaccine, '');
            request()->file('vaccine')->move('vaccines', '\user_' . $user->id . '_vaccine_' . $vaccine, '');
            auth()->user()->update(['vaccine' => ('\vaccines' . '\user_' . $user->id . '_vaccine_' . $vaccine)]);
        }

        dd($user);

        // dd($request->file('vaccine'));
        $isOpen = false;
        return back()->with('created', '');
    }

    public function show()
    {
        $isOpen = false;
        return view('admin.admindashboard', ['isOpen' => $isOpen]);
    }

    public function openPopup()
    {
        $isOpen = true;
        return view('admin.admindashboard', ['isOpen' => $isOpen]);
    }
}
