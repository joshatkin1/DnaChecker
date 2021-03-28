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
Route::get('/dnachecker', function () {
    if(session()->has('uploaded')){
        return View::make('dnachecker')->with("uploaded" , true);
    }else{
        return View::make('dnachecker');
    }
});

Route::get('/dnachecker/run', [App\Http\Controllers\DnaCheckerController::class, 'runTest'])->name('dna-checker-test');
Route::post('/dnachecker/file/upload', [App\Http\Controllers\DnaFileController::class, 'dnaFileUpload'])->name('dna-file-upload');
Route::get('/dnachecker/results/file/download', [App\Http\Controllers\DnaFileController::class, 'dnaOutputFileDownload'])->name('dna-file-download');
