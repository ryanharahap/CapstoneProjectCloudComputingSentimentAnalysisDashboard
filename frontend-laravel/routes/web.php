<?php

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

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/Login', function () { return view('pages/login');});
Route::get('/Register', function () { return view('pages/register');});
Route::get('/Result', function () { return view('pages/result');});
Route::get('/Chart', function () { return view('pages/chart');});