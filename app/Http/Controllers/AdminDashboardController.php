<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LogInformation;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function show()
    {
        $loginformation = LogInformation::all();

        // For Curfew
        // foreach($loginformation as $loginfo){
        //     if ($loginfo->timeout = 0);
        //     $curfewna = true;
        // }

        // dd($curfewna);

        $totalLogs = DB::table('log_information')->count();
        $dates = DB::table('log_information')->value('name');

        // $now = Carbon::now()->format('j M Y , g:ia')->tz('GMT+8');
        // $loginformation->timein = Carbon::now('GMT+8')->format('H:i:s');


        //log report weekly
        $dates = DB::select('SELECT count(*) as `numberoflogs`, `dayin` as `dates` FROM `log_information` GROUP BY `dayin` ORDER BY `dayin` DESC LIMIT 7');
        foreach ($dates as $date) {
            $numberoflogreverse[] = $date->numberoflogs;
            $daysreverse[] = $date->dates;
            $numberoflog = array_reverse($numberoflogreverse);
            $days = array_reverse($daysreverse);
        }

        // For Highest visitor
        $highestvisitor = DB::select('SELECT `name`, COUNT(`name`) AS `highestvisitor` FROM `log_information` GROUP BY `name` ORDER BY `highestvisitor` DESC LIMIT 3');

        // Most Recent Log
        $recentlogin = DB::select('SELECT `name` AS `name`, `usertype`, `timein` FROM `log_information` ORDER BY `timein` DESC LIMIT 3');
        $recentlogout = DB::select('SELECT `name` AS `name`, `usertype`, `timeout` FROM `log_information` ORDER BY `timeout` DESC LIMIT 3');

        // Frequent Log
        $frequenttimein = DB::select('SELECT `frequenttimein`, COUNT(`frequenttimein`) AS `highesttimein` FROM `log_information` GROUP BY `frequenttimein` ORDER BY `highesttimein` DESC LIMIT 3');
        $frequenttimeout = DB::select('SELECT `frequenttimeout`, COUNT(`frequenttimeout`) AS `highesttimeout` FROM `log_information` GROUP BY `frequenttimeout` ORDER BY `highesttimeout` DESC LIMIT 3');

        // Individual Frequent Log (Attempts)
        $frequenttimeinindiv = DB::select('SELECT DISTINCT(`name`) ,`frequenttimein`, COUNT(`frequenttimein`) FROM `log_information` GROUP BY `name`, `frequenttimein` ORDER BY COUNT(`frequenttimein`) DESC');
        $frequenttimeinindiv = DB::select('SELECT `name`, CAST(AVG(`frequenttimein`)AS INT) as `frequent time in` FROM log_information GROUP BY `name` ORDER BY `frequent time in` DESC');

        // For Curfew Monitoring
        $curfewcheck = DB::select('SELECT usertype, name, roomToVisit, nameToVisit, timein FROM `log_information` WHERE timeout is NULL');

        if ((Carbon::now('GMT+8')->format('H') >= 20 && Carbon::now('GMT+8')->format('i') > 30) || (Carbon::now('GMT+8')->format('H') >= 20)){
            $timenow = Carbon::now('GMT+8')->format('H');
            $curfewnaba = 1;
            // return redirect()->route('admindashboard', [
            //     'days' => $days,
            //     'numberoflog' => $numberoflog,
            //     'recentlogin' => $recentlogin,
            //     'recentlogout' => $recentlogout,
            //     'curfewcheck' => $curfewcheck,
            // ])->with('curfewna', '');
        }

        // dd($curfewna);

        // dd($timenow);
        return view('admin.admindashboard', [
            'days' => $days,
            'numberoflog' => $numberoflog,
            'recentlogin' => $recentlogin,
            'recentlogout' => $recentlogout,
            'curfewcheck' => $curfewcheck,
            'curfewnaba' => $curfewnaba,
        ]);
    }
}
