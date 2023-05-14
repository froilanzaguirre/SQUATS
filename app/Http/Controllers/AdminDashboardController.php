<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LogInformation;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function show()
    {
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $loginformation = LogInformation::all();

        // For Curfew
        // foreach($loginformation as $loginfo){
        //     if ($loginfo->timeout = 0);
        //     $curfewna = true;
        // }

        // dd($curfewna);

        $timeanddate = Carbon::now('GMT+8')->format('l — F j, Y — h:iA');

        $totalLogs = DB::table('log_information')->count();
        $datenow = Carbon::now('GMT+8')->format('m-d-Y');
        $daynow = Carbon::now('GMT+8')->format('d');
        $daynowfortable = Carbon::now('GMT+8')->format('d');
        $monthnow = Carbon::now('GMT+8')->format('m');
        $monthnowfortable = Carbon::now('GMT+8')->format('m');
        $displaymonth = " ";
        for ($i = 0; $i<7 ; $i++){
            if ($daynow <=0){
                $daynow += 30;
                $monthnow -= 1;
            }
            $daysreverse[] = $monthnow . "-" . sprintf("%02d", $daynow--) . Carbon::now('GMT+8')->format('-Y');
            $days = array_reverse($daysreverse);
        }
        for ($i = 0; $i<7 ; $i++){
            if ($daynowfortable <=0){
                $daynowfortable += 30;
                $monthnowfortable -= 1;
            }
            switch ($monthnowfortable) {
                case 1:
                    $displaymonth = "January";
                    break;
                case 2:
                    $displaymonth = "February";
                    break;
                case 3:
                    $displaymonth = "March";
                    break;
                case 4:
                    $displaymonth = "April";
                    break;
                case 5:
                    $displaymonth = "May";
                    break;
                case 6:
                    $displaymonth = "June";
                    break;
                case 7:
                    $displaymonth = "July";
                    break;
                case 8:
                    $displaymonth = "August";
                    break;
                case 9:
                    $displaymonth = "September";
                    break;
                case 10:
                    $displaymonth = "October";
                    break;
                case 11:
                    $displaymonth = "November";
                    break;
                case 12:
                    $displaymonth = "December";
                    break;
                default:
                    break;
            }
            $daystablereverse[] = $displaymonth . " " . sprintf("%02d", $daynowfortable--) . Carbon::now('GMT+8')->format(' Y');
            $daysfortable = array_reverse($daystablereverse);
        }
        for ($i = 0; $i<7 ; $i++){
            $daystablereverse2[] = Carbon::now('GMT+8')->format('l');
            $daysfortable2 = array_reverse($daystablereverse2);
        }
        // $now = Carbon::now()->format('j M Y , g:ia')->tz('GMT+8');
        // $loginformation->timein = Carbon::now('GMT+8')->format('H:i:s');

        
        for ($i = 0; $i<7 ; $i++){
            $logcardresident = DB::select('SELECT count(usertype) AS total FROM users WHERE usertype = "Resident"');
            $numberoflogcardresident = 0;
            foreach ($logcardresident as $logtotal) {
                $numberoflogcardresident = $logtotal->total;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logcardtoday = DB::select('SELECT count(*) AS total FROM log_information WHERE dayin = "' . $datenow . '"');
            $numberoflogcardtoday = 0;
            foreach ($logcardtoday as $logtotal) {
                $numberoflogcardtoday = $logtotal->total;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logcardvisitor = DB::select('SELECT count(*) AS total FROM log_information WHERE usertype = "Visitor" AND dayin = "' . $datenow . '"');
            $numberoflogcardvisitor = 0;
            foreach ($logcardvisitor as $logtotal) {
                $numberoflogcardvisitor = $logtotal->total;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logcardadmin = DB::select('SELECT count(usertype) AS total FROM users WHERE usertype = "Admin"');
            $numberoflogcardadmin = 0;
            foreach ($logcardadmin as $logtotal) {
                $numberoflogcardadmin = $logtotal->total;
            }
        }


        //log report weekly
        for ($i = 0; $i<7 ; $i++){
            $logstotal = DB::select('SELECT count(*) as `logtotal`, `dayin` as `dates` FROM `log_information` WHERE dayin = "' . $days[$i] . '" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 7');
            $numberoflogtotal[$i] = 0;
            foreach ($logstotal as $logtotal) {
                $numberoflogtotal[$i] = $logtotal->logtotal;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logsvisitor = DB::select('SELECT count(*) as `logvisitor`, `dayin` as `dates` FROM `log_information` WHERE dayin = "' . $days[$i] . '" AND usertype = "Visitor" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 7');
            $numberoflogvisitor[$i] = 0;
            foreach ($logsvisitor as $logvisitor) {
                $numberoflogvisitor[$i] = $logvisitor->logvisitor;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logsresident = DB::select('SELECT count(*) as `logresident`, `dayin` as `dates` FROM `log_information` WHERE dayin = "' . $days[$i] . '" AND usertype = "Resident" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 7');
            $numberoflogresident[$i] = 0;
            foreach ($logsresident as $logresident) {
                $numberoflogresident[$i] = $logresident->logresident;
            }
        }
        for ($i = 0; $i<7 ; $i++){
            $logsstaff = DB::select('SELECT count(*) as `logstaff`, `dayin` as `dates` FROM `log_information` WHERE dayin = "' . $days[$i] . '" AND usertype = "Staff" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 7');
            $numberoflogstaff[$i] = 0;
            foreach ($logsstaff as $logstaff) {
                $numberoflogstaff[$i] = $logstaff->logstaff;
            }
        }

        //for pie chart (today) for week change limit to 7
        $residents = DB::select('SELECT count(*) as `numberofresidents`, `dayin` as `dates` FROM `log_information` WHERE `usertype` = "Resident" AND dayin = "' . $datenow . '" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 1');
        $numofresidents = 0;
        foreach ($residents as $ress){
            $numofresidents = $ress->numberofresidents;
        }
        $staffs = DB::select('SELECT count(*) as `numberofstaffs`, `dayin` as `dates` FROM `log_information` WHERE `usertype` = "Staff" AND dayin = "' . $datenow . '" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 1');
        $numofstaffs = 0;
        foreach ($staffs as $stass){
            $numofstaffs = $stass->numberofstaffs;
        }
        $visitors = DB::select('SELECT count(*) as `numberofvisitors`, `dayin` as `dates` FROM `log_information` WHERE `usertype` = "Visitor" AND dayin = "' . $datenow . '" GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 1');
        $numofvisitors = 0;
        foreach ($visitors as $viss){
            $numofvisitors = $viss->numberofvisitors;
        }


        // For Highest visitor
        $highestvisitor = DB::select('SELECT `name`, COUNT(`name`) AS `highestvisitor` FROM `log_information` GROUP BY `name` ORDER BY `highestvisitor` DESC LIMIT 3');

        // Most Recent Log
        $recentlogin = DB::select('SELECT `name` AS `name`, `usertype`, `timein` FROM `log_information` WHERE dayin = "' . $datenow . '" ORDER BY `timein` DESC LIMIT 3');
        $recentlogout = DB::select('SELECT `name` AS `name`, `usertype`, `timeout` FROM `log_information` WHERE `timeout` is not NULL AND dayin = "' . $datenow . '" ORDER BY `timeout` DESC LIMIT 3');

        // Frequent Log
        $frequenttimein = DB::select('SELECT `frequenttimein`, COUNT(`frequenttimein`) AS `highesttimein` FROM `log_information` GROUP BY `frequenttimein` ORDER BY `highesttimein` DESC LIMIT 3');
        $frequenttimeout = DB::select('SELECT `frequenttimeout`, COUNT(`frequenttimeout`) AS `highesttimeout` FROM `log_information` GROUP BY `frequenttimeout` ORDER BY `highesttimeout` DESC LIMIT 3');

        // Individual Frequent Log (Attempt)
        $frequenttimeinindiv = DB::select('SELECT DISTINCT(`name`) ,`frequenttimein`, COUNT(`frequenttimein`) FROM `log_information` GROUP BY `name`, `frequenttimein` ORDER BY COUNT(`frequenttimein`) DESC');
        $frequenttimeinindiv = DB::select('SELECT `name`, CAST(AVG(`frequenttimein`)AS INT) as `frequent time in` FROM log_information GROUP BY `name` ORDER BY `frequent time in` DESC');

        // Most Visited Resident
        $mostvisited = DB::select('SELECT nameToVisit, count(nameToVisit) as `total` FROM `log_information` WHERE `nameToVisit` != "Resident" AND `nameToVisit` != "Staff" GROUP BY `nameToVisit` ORDER BY `total` DESC LIMIT 1');
        $mostvisitedresident = $mostvisited[0];

        // if (Carbon::now('GMT+8')->format('H') >= 20){
        if ((Carbon::now('GMT+8')->format('H') >= 22 && Carbon::now('GMT+8')->format('i') > 30)){
            $timenow = Carbon::now('GMT+8')->format('H');
            $iscurfew = '1';
        }
        else if ((Carbon::now('GMT+8')->format('H') >= 22)){
            $timenow = Carbon::now('GMT+8')->format('H');
            $iscurfew = '1';
        }
        else if ((Carbon::now('GMT+8')->format('H') < 5)){
            $timenow = Carbon::now('GMT+8')->format('H');
            $iscurfew = '1';
        }
        else {
            $iscurfew = '0';
        }

        return view('admin.admindashboard', [
            'days' => $days,
            'daysfortable' => $daysfortable,
            'daysfortable2' => $daysfortable2,
            'numberoflogtotal' => $numberoflogtotal,
            'numberoflogvisitor' => $numberoflogvisitor,
            'numberoflogresident' => $numberoflogresident,
            'numberoflogstaff' => $numberoflogstaff,
            'recentlogin' => $recentlogin,
            'recentlogout' => $recentlogout,
            'residents' => $numofresidents,
            'visitors' => $numofvisitors,
            'staffs' => $numofstaffs,
            'iscurfew' => $iscurfew,
            'timenow' => $timeanddate,
            'datenow' => $datenow,
            'numberoflogcardresident' => $numberoflogcardresident,
            'numberoflogcardtoday' => $numberoflogcardtoday,
            'numberoflogcardvisitor' => $numberoflogcardvisitor,
            'numberoflogcardadmin' => $numberoflogcardadmin,
            'timeanddate' => $timeanddate,
            'mostvisitedresident' => $mostvisitedresident,
        ]);
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
        
    }

    public function showcurfew(){
        // For Curfew Monitoring
        
        $curfewcheck = DB::select('SELECT usertype, name, roomToVisit, nameToVisit, timein FROM `log_information` WHERE `usertype` != "Resident" AND timeout is NULL AND dayin IN (SELECT MAX(dayin) FROM log_information)');
        $curfewcheck = DB::select('SELECT usertype, name, roomToVisit, nameToVisit, timein FROM `log_information` WHERE `usertype` != "Resident" AND timeout is NULL AND dayin IN (SELECT MAX(dayin) FROM log_information)');

        return view('admin.curfewtable', [
            'curfewcheck' => $curfewcheck,
        ]);
    }
}