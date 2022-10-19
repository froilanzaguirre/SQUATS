<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpectedVisitor;

class ExpectedVisitorController extends Controller
{
    public function show()
    {
        $expectedVisitor = ExpectedVisitor::all();

        return view('expectedVisitor', compact('expectedVisitor'));
    }
}