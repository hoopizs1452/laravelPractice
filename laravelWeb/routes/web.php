<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('home');//welcome
});

Route::view('upload', 'upload');
//Route::get('/upload', function () { return view('uplaod'); });
Route::post('upload', [UploadController::class, 'index']);
//Route::get('test', function () { return view('home'); });
Route::get('downloadFile', [UploadController::class, 'downloadFile']);
//Route::get('getAllFile', [UploadController::class, 'getAllFile']);
Route::view('getFile', 'getFile');
