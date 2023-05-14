<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ExpectedVisitor;
use Session;

class QRCodeController extends Controller
{

    public function create()
    {
        $users = DB::table('expected_visitor')->latest()->first();

        return view('profile.userQR', ['qrid' => $users->id, 'qrname' => $users->nameOfVisitor, 'qrusertype' => 'Visitor'] );
    }

    public function store($id, Request $request, User $user)
    {
        $visitor = ExpectedVisitor::find($id);
        // dd($visitor);
        if (User::find($id) == NULL){
            $user = User::create([
                'id' => $visitor->id,
                'name' => $visitor->nameOfVisitor,
                'gender' => $visitor->gender,
                'contactNumber' => $visitor->contactNumber,
                'dateOfVisit' => $visitor->dateOfVisit,
                'purposeOfVisit' => $visitor->purposeOfVisit,
                'nameToVisit' => $visitor->nameToVisit,
                'roomToVisit' => $visitor->roomToVisit,
                'vaccinedose' => $visitor->vaccinedose,
                'vaccine' => $visitor->vaccine,
                'usertype' => 'Visitor',
            ]);
            
            $visitor->status = "Approved";
            $visitor->save();

        } elseif (($visitor->id == User::find($id)->id)){
            $visitor->status = "Approved";
            $visitor->save();
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
