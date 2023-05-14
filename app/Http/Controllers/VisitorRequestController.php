<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpectedVisitor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VisitorRequestController extends Controller
{
    public function createVisitor(Request $request){
        $lastuser = DB::select('SELECT max(id) as total FROM `users`');
        $lastvisitor = DB::select('SELECT max(id) as total FROM `expected_visitor`');
        
        if ($lastuser[0]->total <= $lastvisitor[0]->total){
            $idforvisitor = $lastvisitor[0]->total + 1;
        } else {
            $idforvisitor = $lastuser[0]->total + 1;
        }

        $visitor = new ExpectedVisitor();
        $visitor->id = $idforvisitor;
        $visitor->nameOfVisitor = $request->nameOfVisitor;
        $visitor->contactNumber = $request->contactNumber;
        $visitor->gender = $request->gender;
        $visitor->dateOfVisit = $request->dateOfVisit;
        $visitor->purposeOfVisit = $request->purposeOfVisit;
        $visitor->nameToVisit = $request->nameToVisit;
        $visitor->roomToVisit = $request->roomToVisit;
        $visitor->vaccinedose = $request->vaccinedose;
        $visitor->status = 'Pending';

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            request()->file('vaccine')->move('vaccines', '\user_' . $idforvisitor . '_vaccine_' . $vaccine, '');
            $visitor->vaccine = '\vaccines' . '\user_' . $idforvisitor . '_vaccine_' . $vaccine;
        }

        $visitor->save();

        return back()->with('generated', ['qrid' => $visitor->id]);
    } 

    public function deleteVisitor($id){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $visitorToDelete = ExpectedVisitor::find($id);
        $visitorToDelete->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return back()->with('visitorDeleted', '');
    }
}