<?php

use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\DropDownController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/business-hour',[BusinessHourController::class,'index']);
Route::post('/business-hour',[BusinessHourController::class,'update'])->name('business_hour.update');


Route::get('dropdown',[DropDownController::class,'index']);
Route::post('api/fetch-state',[DropDownController::class,'fatchState']);
Route::post('api/fetch-cities',[DropDownController::class,'fatchCity']);

Route::get('search', [DropDownController::class, 'autosearch'])->name('search');
Route::post('get_user', [DropDownController::class, 'get_user'])->name('get_user');
