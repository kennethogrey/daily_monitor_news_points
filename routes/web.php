<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ApplicationController::class,'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create_news_point', [\App\Http\Controllers\NewsPointController::class,'create'])->name('news_point.create');
Route::post('/home/create_news_point', [\App\Http\Controllers\NewsPointController::class,'store'])->name('news_point.store');
Route::delete('home/delete/{id}',[\App\Http\Controllers\NewsPointController::class,'destroy'])->name('news_point.delete');
Route::get('home/edit/{id}',[\App\Http\Controllers\NewsPointController::class,'edit'])->name('news_point.edit');
Route::post('home/edit/{id}',[\App\Http\Controllers\NewsPointController::class,'update'])->name('news_point.update');
