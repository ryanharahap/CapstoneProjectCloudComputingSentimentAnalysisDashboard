<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YoutubeController;

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
Route::get('/', [YoutubeController::class, 'getPopularVideos']);

Route::get('/login', function () { return view('authentication/login');});
Route::get('/register', function () { return view('authentication/register');});

Route::get('/youtube-search', function () { return view('pages/youtube-pages/youtube-search');});
Route::get('/youtube', function () { return view('pages/youtube-pages/youtube');});

Route::get('/playstore-search', function () { return view('pages/playstore-pages/playstore-search');});
Route::get('/playstore', function () { return view('pages/playstore-pages/playstore');});

Route::get('/news-search', function () { return view('pages/news-pages/news-search');});
Route::get('/news', function () { return view('pages/news-pages/news');});
