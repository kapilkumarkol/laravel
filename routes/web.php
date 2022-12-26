<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carController;
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

Route::get('/carlist',[carController::class,'list']);
Route::get('/reclist',[carController::class,'data']);
Route::get('/viewform',[carController::class,'form']);
Route::get('/savedata/{carname}/{company}/{stock}/{city}',[carController::class,'getdata']);
Route::get('/editform/{id}',[carController::class,'edit']);
Route::get('/senddata/{id}',[carController::class,'send']);
Route::get('/changedata/{id}/{crnm}/{cmpnm}/{stknm}/{ctnm}',[carController::class,'change']);
Route::get('/deldata/{id}',[carController::class,'del']);

