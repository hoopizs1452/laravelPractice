<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;

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
    return view('home');
});
// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class)->middleware('auth');
Route::view('upload', 'upload.upload')->middleware('auth');
Route::view('getFile', 'upload.getFile')->middleware('auth');
Route::get('downloadFile/{file}', [UploadController::class, 'downloadFile'])->middleware('auth');
Route::post('upload', [UploadController::class, 'index']);
//Route::post('upload', [UploadController::class, 'index']);