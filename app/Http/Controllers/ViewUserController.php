<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ViewUserController extends Controller
{
    public function show(){
        $users = User::paginate(5);
        $isOpen = false;

        return view('admin.viewusers', ['isOpen' => $isOpen], compact('users'));
    }

    public function openPopup()
    {
        $users = User::paginate(5);
        $isOpen = true;
        return view('admin.viewusers', ['isOpen' => $isOpen], compact('users'));
    }

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
            $user->update(['vaccine' => ('\vaccines' . '\user_' . $user->id . '_vaccine_' . $vaccine)]);
        }

        dd($user->id);
        $isOpen = false;
        return back()->with('created', '');
    }


}
