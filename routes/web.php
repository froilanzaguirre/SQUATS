<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//User QR Code
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/userQR', function () {
//         return view('profile.userQR');
//     })->name('userQR');
//     Route::post('userQR', [App\Http\Controllers\QRCodeController::class, 'store'])
//     ->name('userQR.post');
// });

//New User QR

Route::get('userQR', [App\Http\Controllers\QRCodeController::class, 'create'])->name('userQR.create');
Route::post('userQR', [App\Http\Controllers\QRCodeController::class, 'store'])->name('userQR.post');

//Visitor QR
Route::get('/visitorQR', function () {
    return view('profile.visitorQR');
})->name('visitorQR');
Route::post('visitorQR', [App\Http\Controllers\VisitorQRController::class, 'newVisitor'])
->name('visitorQR.post');

Route::get('/visitorRequest', function () {
    return view('visitorRequest');
})->name('visitorRequest');
Route::post('visitorRequest', [App\Http\Controllers\VisitorRequestController::class, 'createVisitor'])
->name('visitorRequest.post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/scanQR', [App\Http\Controllers\ScannerController::class, 'show'])->name('scanQR');
});
Route::get('/logout/{id}', [App\Http\Controllers\ScannerController::class, 'timeout']);

//Register Step 2 and Step 3
Route::group(['middleware' => 'auth'], function(){
    Route::get('register-step2', [App\Http\Controllers\RegisterStepTwoController::class, 'create'])
    ->name('register-step2.create');
    Route::post('register-step2', [App\Http\Controllers\RegisterStepTwoController::class, 'store'])
    ->name('register-step2.post');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('register-step3', [App\Http\Controllers\RegisterStepThreeController::class, 'create'])
    ->name('register-step3.create');
    Route::post('register-step3', [App\Http\Controllers\RegisterStepThreeController::class, 'store'])
    ->name('register-step3.post');
});

//After Scanning QR Code
//User info will be stored in the log info table
// Route::get('/user/{id}', function($id){
//     return response($id);
// });

Route::get('/user/{id}', [App\Http\Controllers\ScannerController::class, 'storeLogInfo'])->middleware('throttle:scancd');
Route::get('loginformation', [App\Http\Controllers\LogInformationController::class, 'show'])->name('loginformation');
Route::get('/vaccineInfo/{userid}', [App\Http\Controllers\VaccineInfoController::class, 'show']);
Route::get('expectedVisitor', [App\Http\Controllers\ExpectedVisitorController::class, 'show'])->name('expectedVisitor');
Route::get('admindashboard', [App\Http\Controllers\AdminDashboardController::class, 'show'])->middleware('throttle:scancd')->name('admindashboard');

// sidebartest
Route::get('sidebar', function () {
    return view('admin.sidebar');
})->name('sidebar');


// View Users
Route::get('viewusers', [App\Http\Controllers\ViewUserController::class, 'show'])->name('viewusers');
//create resident account
Route::get('openAccountCreator', [App\Http\Controllers\ViewUserController::class, 'openPopup']);
Route::post('createResidentAccount', [App\Http\Controllers\ViewUserController::class, 'createAccount'])->name('createResidentAccount');

// PDF
Route::get('downloadlogpdf', [App\Http\Controllers\PDFController::class, 'downloadlogpdf'])->name('downloadlogpdf');
Route::get('/vaccineInfo/downloaduserid/{userid}', [App\Http\Controllers\PDFController::class, 'downloaduserid']);

Route::get('/vaccineInfo/testview/{userid}', [App\Http\Controllers\PDFController::class, 'testview']);
