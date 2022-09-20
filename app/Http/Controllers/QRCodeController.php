<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function create()
    {
        return view('profile.userQR');
    }

    public function store(Request $request)
    {
        auth()->user()->update([
            'dateOfVisit' => $request->dateOfVisit,
            'purposeOfVisit' => $request->purposeOfVisit,
        ]);

        return redirect()->route('userQR');
    }
}
