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

Route::get('/test/button', function () {
    return view('button');
});
Route::get('/test/dnachecker', function () {
    return view('dnachecker');
});

Route::get('/test/dnachecker/run', [App\Http\Controllers\DnaCheckerController::class, 'runTest'])->name('companyRegister-view');

