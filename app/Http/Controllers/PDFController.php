<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogInformation;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function logpdf(){
        $loginformation = LogInformation::all();

        return view('downloadpdf.logpdf', compact('loginformation'));
    }

    public function downloadlogpdf(){
        $loginformation = LogInformation::all();

        $pdf = Pdf::loadView('downloadpdf.logpdf', compact('loginformation'))->setPaper('a4', 'landscape');
        return $pdf->download('log.pdf');
    }

    public function downloaduserid($userid){
        $qr = QrCode::size(300)->generate("http://127.0.0.1:8000/user/" . $userid);
        $user = User::find($userid);

        $pdf = Pdf::loadView('downloadpdf.userid', compact('user', 'qr'))->setPaper('a4', 'landscape');
        return $pdf->download('User ID.pdf');
    }

    public function testview($userid){
        $qr = QrCode::size(300)->generate("http://127.0.0.1:8000/user/" . $userid);
        $user = User::find($userid);

        return view('downloadpdf.userid', compact('user', 'qr'));
    }
}
