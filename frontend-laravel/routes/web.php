<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrendController;
use App\Http\Controllers\ApiController;
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

// Route::get('/', function () {
//     return view('pages/index');
// });

Route::get('/', [TrendController::class, 'getTrends']);

Route::get('login', function () { return view('authentication/login');});
Route::get('register', function () { return view('authentication/register');});

Route::get('news', function () { return view('pages/news-pages/news-search');});
Route::get('news-crawl', [ApiController::class, 'crawlNews']);

Route::get('youtube', function () { return view('pages/youtube-pages/youtube-search');});
Route::get('youtube-crawl', [ApiController::class, 'crawlYoutube']);

Route::get('playstore', function () { return view('pages/playstore-pages/playstore-search');});
Route::get('playstore-crawl', [ApiController::class, 'crawlPlaystore']);


