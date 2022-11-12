<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
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
    return view('layouts.app');
});

Route::resource('students', StudentController::class);
Route::get('students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
Route::get('students/forcedelete/{id}', [StudentController::class, 'forceDelete'])->name('students.force-delete');


Route::resource('phones', PhoneController::class);
Route::get('phones/restore/{id}', [PhoneController::class, 'restore'])->name('phones.restore');
Route::get('phones/forcedelete/{id}', [PhoneController::class, 'forceDelete'])->name('phones.force-delete');
