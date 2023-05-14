<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LogInformation;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function logpdf(){
        $loginformation = LogInformation::all();

        return view('downloadpdf.logpdf', compact('loginformation'));
    }

    public function downloadlogpdf($search){
        // $search = $request->search;
        // $loginformation = LogInformation::where('dayin', 'LIKE', '%' . $search .'%')
        // ->orWhere('name', 'LIKE', '%' . $search .'%')
        // ->orWhere('roomToVisit', 'LIKE', '%' . $search .'%')
        // ->orWhere('nameToVisit', 'LIKE', '%' . $search .'%')
        // ->orWhere('timein', 'LIKE', '%' . $search .'%');

        $loginformation = DB::select('SELECT * FROM `log_information` 
        WHERE dayin LIKE "%' . $search . '%" 
        OR `name` LIKE "%' . $search . '%"
        OR `roomToVisit` LIKE "%' . $search . '%"
        OR `nameToVisit` LIKE "%' . $search . '%"
        OR `usertype` LIKE "%' . $search . '%"
        OR `timein` LIKE "%' . $search . '%"');

        $pdf = Pdf::loadView('downloadpdf.logpdf', compact('loginformation'))->setPaper('a4', 'landscape');
        return $pdf->download('log.pdf');
    }    

    public function downloadlogpdfnow(){
        $previousroute = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        
        $datenow = Carbon::now('GMT+8')->format('m-d-Y');
        $search = "$datenow";

        // $loginformation = LogInformation::where('dayin', $datenow);
        if ($previousroute == "showalllogs"){
            $loginformation = DB::select('SELECT * FROM `log_information`');
        } else {
            $loginformation = DB::select('SELECT * FROM `log_information` WHERE `dayin` = "'. $search .'"');
        }
        

        $pdf = Pdf::loadView('downloadpdf.logpdf', compact('loginformation'))->setPaper('a4', 'landscape');
        return $pdf->download('log.pdf');
    }

    public function downloaduserid($userid){
        $qr = QrCode::size(300)->generate("http://127.0.0.1:8000/user" . $userid);
        $user = User::find($userid);

        $pdf = Pdf::loadView('downloadpdf.userid', compact('user', 'qr'))->setPaper('a4', 'landscape');
        return $pdf->download('User ID.pdf');
    }

    public function testview($userid){
        // $qr = QrCode::size(300)->generate("https://staphilomenaresidence.com/user/" . $userid);
        $qr = QrCode::size(300)->generate("http://127.0.0.1:8000/user" . $userid);
        $user = User::find($userid);

        return view('downloadpdf.userid', compact('user', 'qr'));
    }

    public function downloadresidentslist(){
        $users = User::where('usertype', 'Resident');
        $users = DB::select('SELECT * FROM `users` WHERE `usertype` = "Resident"');
        $staffs = DB::select('SELECT * FROM `users` WHERE `usertype` = "Staff"');

        $pdf = Pdf::loadView('downloadpdf.residentslistpdf', compact('users', 'staffs'))->setPaper('a4', 'landscape');
        return $pdf->download('list-of-resident.pdf');
    }
}
