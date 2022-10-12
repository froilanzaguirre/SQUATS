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
Route::get('/userQR', function () {
    return view('profile.userQR');
})->name('userQR');
Route::post('userQR', [App\Http\Controllers\QRCodeController::class, 'store'])
->name('userQR.post');

Route::get('/visitorQR', function () {
    return view('profile.visitorQR');
})->name('visitorQR');
Route::post('visitorQR', [App\Http\Controllers\QRCodeController::class, 'store'])
->name('visitorQR.post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/scanQR', function () {
        return view('qrCodeScanner');
    })->name('scanQR');
});


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

Route::get('/user/{id}', [App\Http\Controllers\ScannerController::class, 'storeLogInfo']);

Route::get('loginformation', [App\Http\Controllers\LogInformationController::class, 'show'])->name('loginformation');