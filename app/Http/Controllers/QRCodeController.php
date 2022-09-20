<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

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
            'nameToVisit' => $request->nameToVisit,
            'roomToVisit' => $request->roomToVisit,
        ]);

        return back()->with('success', '');
    }
}
