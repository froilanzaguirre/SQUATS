<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpectedVisitor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitorRequestController extends Controller
{
    public function createVisitor(Request $request){
        $user = Auth::user();
        $visitor = new ExpectedVisitor();
        $visitor->nameOfOwner = $user->fname . " " . $user->lname;
        $visitor->nameOfVisitor = $request->nameOfVisitor;
        $visitor->dateOfVisit = $request->dateOfVisit;
        $visitor->roomToVisit = $request->roomToVisit;
        $visitor->purposeOfVisit = $request->purposeOfVisit;

        $visitor->save();

        return back()->with('visitorcreation', '');
    } 
}