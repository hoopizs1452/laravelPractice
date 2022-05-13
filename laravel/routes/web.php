<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SalaryController;

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
Route::get('/wel', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('salaries', SalaryController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
// Route::resource('salaries', SalaryController::class)->names(['salaries.index' => 'salary'])->middleware('auth');

Route::view('upload', 'upload.upload')->middleware('auth');
Route::view('getFile', 'upload.getFile')->middleware('auth');
// Route::get('salary', [SalaryController::class, 'index'])->middleware('auth');
Route::get('salary', [SalaryController::class, 'index'])->middleware('auth');

Route::get('downloadFile/{file}', [UploadController::class, 'downloadFile'])->middleware('auth');
Route::post('upload', [UploadController::class, 'index']);
Route::get('salary1/{value}', [UploadController::class, 'show']);
Route::post('test', [SalaryController::class, 'filter'])->middleware('auth');
// Route::post('test', [UploadController::class, 'filter']);




Route::view('vga', 'webCrawler');