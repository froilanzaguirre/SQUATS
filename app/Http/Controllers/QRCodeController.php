<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class QRCodeController extends Controller
{
    public function create()
    {
        return view('profile.userQR');
    }

    public function store(Request $request, User $user)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'contactNumber' => $request->contactNumber,
            'dateOfVisit' => $request->dateOfVisit,
            'purposeOfVisit' => $request->purposeOfVisit,
            'nameToVisit' => $request->nameToVisit,
            'roomToVisit' => $request->roomToVisit,
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            request()->file('vaccine')->storeAs('vaccines', '\user.' . $user->id . '\vaccine.' . $vaccine, '');
            $user->update(['vaccine' => ('vaccines' . '\user.' . $user->id . '\vaccine.' . $vaccine)]);
        }

        return back()->with('generated', '');
    }

    public function downloadQR(){

        return redirect()->route('userQR');
        
    }
}
