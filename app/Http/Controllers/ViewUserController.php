<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ViewUserController extends Controller
{
    public function show(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $users = User::where('usertype', 'Resident')->paginate(10);
                $staffs = User::where('usertype', 'Staff')->paginate(10);
                $isOpen = false;
                $isOpenEdit = false;
                $isOpenDelete = false;
                
                return view('admin.viewusers', ['isOpen' => $isOpen, 'isOpenEdit' => $isOpenEdit, 'isOpenDelete' => $isOpenDelete], compact('users', 'staffs'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function search(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Admin"){
                $search = $request->search;
                $searchstaff = $request->searchstaff;

                if (($search != NULL) && ($searchstaff == NULL)) {
                    $users = User::where('usertype', 'Resident')
                    ->where('name', 'LIKE', '%' . $search .'%')
                    ->orWhere('roomToVisit', 'LIKE', '%' . $search .'%')
                    ->orWhere('nameToVisit', 'LIKE', '%' . $search .'%')
                    ->where('usertype', 'Resident')
                    ->paginate(10);

                    $staffs = User::where('usertype', 'Staff')
                    ->paginate(10);
                } elseif (($search == NULL) && ($searchstaff != NULL)) {
                    $users = User::where('usertype', 'Resident')
                    ->paginate(10);

                    $staffs = User::where('usertype', 'Staff')
                    ->where('name', 'LIKE', '%' . $searchstaff .'%')
                    ->orWhere('roomToVisit', 'LIKE', '%' . $searchstaff .'%')
                    ->orWhere('nameToVisit', 'LIKE', '%' . $searchstaff .'%')
                    ->where('usertype', 'Staff')
                    ->paginate(10);
                } else{
                    $users = User::where('usertype', 'Resident')
                    ->paginate(10);

                    $staffs = User::where('usertype', 'Staff')
                    ->paginate(10); 
                }

                
                $isOpen = false;
                $isOpenEdit = false;
                $isOpenDelete = false;
                
                return view('admin.viewusers', ['isOpen' => $isOpen, 'isOpenEdit' => $isOpenEdit, 'isOpenDelete' => $isOpenDelete], compact('users', 'search', 'staffs'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function openPopup()
    {
        $users = User::where('usertype', 'Resident')->paginate(10);
        $staffs = User::where('usertype', 'Staff')->paginate(10);
        $isOpen = true;
        $isOpenEdit = false;
        $isOpenDelete = false;
        return view('admin.viewusers', ['isOpen' => $isOpen, 'isOpenEdit' => $isOpenEdit, 'isOpenDelete' => $isOpenDelete], compact('users', 'staffs'));
    }

    public function openEdit($id){
        $users = User::where('usertype', 'Resident')->paginate(10);
        $staffs = User::where('usertype', 'Staff')->paginate(10);
        $isOpen = false;
        $isOpenEdit = true;
        $isOpenDelete = false;

        $user = User::find($id);

        return view('admin.viewusers', ['isOpen' => $isOpen, 'isOpenEdit' => $isOpenEdit, 'isOpenDelete' => $isOpenDelete], compact('users', 'user', 'staffs'));
    }

    public function createAccount(Request $request, User $user)
    {
        $tempemail = str_replace(' ', '', $request->name) . $request->roomNo . '@squats.com';
        $email = strtolower($tempemail);

        $temppass = str_replace(' ', '', $request->name) . $request->roomNo;
        $password = strtolower($temppass);

        $user = User::create([
            'name' => $request->name,
            'roomToVisit' => $request->roomNo,
            'email' => $email,
            'address' => $request->address,
            'birthDate' => $request->birthDate,
            'contactNumber' => $request->contactNumber,
            'purposeOfVisit' => $request->usertype,
            'nameToVisit' => $request->usertype,
            'usertype' => $request->usertype,
            'gender' => $request->gender,
            'vaccinedose' => $request->vaccinedose,
            'password' => Hash::make($password),
        ]);

        if (request()->hasFile('vaccine')) {
            $vaccine = request()->file('vaccine')->getClientOriginalName();
            // request()->file('vaccine')->storeAs('vaccines', '\user_' . Auth::user()->id . '\vaccine_' . $vaccine, '');
            request()->file('vaccine')->move('vaccines', '\user_' . $user->id . '_vaccine_' . $vaccine, '');
            $user->update(['vaccine' => ('\vaccines' . '\user_' . $user->id . '_vaccine_' . $vaccine)]);
        }

        //dd($user->id);
        $isOpen = false;
        return redirect()->route('viewusers')->with('created', '');
    }

    public function editAccount($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->roomToVisit = $request->roomToVisit;
        $user->contactNumber = $request->contactNumber;
        $user->gender = $request->gender;
        $user->vaccinedose = $request->vaccinedose;
        $user->save();

        $isOpen = false;
        $isOpenEdit = false;
        return redirect()->route('viewusers');
    }

    public function todelete($id){
        $usertodelete = User::find($id);

        $users = User::paginate(10);
        $isOpen = false;
        $isOpenEdit = false;
        $isOpenDelete = true;
        return view('admin.viewusers', ['isOpen' => $isOpen, 'isOpenEdit' => $isOpenEdit, 'isOpenDelete' => $isOpenDelete], compact('users', 'usertodelete'));
    }

    public function delete($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $userdeleted = User::find($id);
        $userdeleted->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        return redirect()->route('viewusers')->with('deleted', '');
    }

    public function staffshow(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Staff"){
                $users = User::where('usertype', 'Resident')->paginate(10);
                
                return view('admin.staffresidentlist', compact('users'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }

    public function staffsearch(Request $request){
        if(Auth::id()){
            if (Auth::user()->usertype == "Staff"){
                $search = $request->search;

                $users = User::where('usertype', 'Resident')
                ->where('name', 'LIKE', '%' . $search .'%')
                ->paginate(10);
                
                return view('admin.staffresidentlist', compact('users', 'search'));
            }
            else {
                return redirect('dashboard');
            }
        }
        else {
            return redirect('login');
        }
    }
}
