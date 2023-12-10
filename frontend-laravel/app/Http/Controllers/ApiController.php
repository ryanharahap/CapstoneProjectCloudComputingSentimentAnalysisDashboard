<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function crawlYoutube(Request $request)
    {
        $url = 'http://localhost:5001/crawl/youtube';
        $data = [
            'video_id' => $request -> video_id,
        ];

        $response = Http::post($url, $data);
        $result = json_decode($response->getBody(), true);

        $youtubeResult = $result['result'];

        return view('pages/youtube-pages/youtube', ['youtube' => $youtubeResult]);
    }

    public function crawlPlaystore(Request $request)
    {
        $url = 'http://localhost:5001/crawl/playstore';
        $data = [
            'package_name' => $request -> package_name,
        ];

        $response = Http::post($url, $data);
        $result = json_decode($response->getBody(), true);

        $playstoreResult = $result['result'];

        return view('pages/playstore-pages/playstore', ['playstore' => $playstoreResult]);
    }

    public function crawlNews()
    {
        $url = 'http://localhost:5001/crawl/news';

        $response = Http::get($url);
        $result = json_decode($response->getBody(), true);

        $newsResult = $result['result'];

        return view('pages/news-pages/news', ['news' => $newsResult]);
    }
}