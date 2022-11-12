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

Route::resource('students', StudentController::class)->except('show');
Route::get('students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');


Route::resource('phones', PhoneController::class)->except('show');
Route::get('phones/restore/{id}', [PhoneController::class, 'restore'])->name('phones.restore');
