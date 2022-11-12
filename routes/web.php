<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubCategoryController;
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

Route::resource('categories', CategoryController::class)->except('show');
Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');

Route::resource('sub-categories', SubCategoryController::class)->except('show');
Route::get('sub-categories/restore/{id}', [SubCategoryController::class, 'restore'])->name('sub-categories.restore');
