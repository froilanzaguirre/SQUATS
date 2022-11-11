<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;

class QRCodeController extends Controller
{

    public function create()
    {
        $users_id = DB::table('users')->latest()->first();
        
        return view('profile.userQR', ['qrid' => $users_id->id]);
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
            'vaccinedose' => $request->vaccinedose,
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            request()->file('vaccine')->storeAs('vaccines', '\user.' . $user->id . '\vaccine.' . $vaccine, '');
            $user->update(['vaccine' => ('vaccines' . '\user.' . $user->id . '\vaccine.' . $vaccine)]);
        }

        return back()->with('generated', ['qrid' => $user->id]);
        
        // return back()->with('generated', '');
    }

    public function downloadQR(){

        return redirect()->route('userQR');
        
    }

    public function getQRID($id){
        $user = User::find($id);

        $qrID->userID = $data->id;

        return back()->with('generated', '');
        // return back()->with('generated', compact('qrID'))
    }

}