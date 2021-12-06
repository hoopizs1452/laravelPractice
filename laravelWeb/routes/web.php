<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('home');//welcome
});

Route::view('upload', 'upload');
Route::post('upload', [UploadController::class, 'index']);
Route::get('downloadFile/{file}', [UploadController::class, 'downloadFile']);
Route::view('getFile', 'getFile');
//Route::get('getAllFile', [UploadController::class, 'getAllFile']);
// Route::view('getAllFile', function(){
//     $file = UploadController::class->getAllFile;
//     return view('getAllFile', ['getAllFile' => $file]);
// });