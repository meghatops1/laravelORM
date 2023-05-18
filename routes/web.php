<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
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

Route::resource('/employee',EmployeeController::class);

Route::get('/emplogin',[EmployeeController::class,'empLogin']);

Route::post('/loginemp',[EmployeeController::class,'empLoginPost'])->name('emp');

Route::get('/emptask',[EmployeeController::class,'index'])->middleware('empauth');
Route::get('/logoutemp',[EmployeeController::class,'logoutEmp'])->name('emplogout');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/post',PostController::class);

});
