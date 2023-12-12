<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Youtube;

class ApiController extends Controller
{
    // Youtube Controller START
    public function crawlYoutube(Request $request)
    {
        $url = 'https://backend-crawler-t6ysugl5ra-et.a.run.app/crawl/youtube';
        $data = ['video_id' => $request->video_id,];
        $response = Http::post($url, $data);

        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $youtubeResult = $result['result'];

            return view('pages/youtube-pages/youtube', ['youtube' => $youtubeResult]);
        } else {
            return back()->with('error', 'Video Id not found');
        }
    }
    //Youtube Controller END

    // Playstore Controller START
    public function crawlPlaystore(Request $request)
    {
        $url = 'https://backend-crawler-t6ysugl5ra-et.a.run.app/crawl/playstore';
        $data = ['package_name' => $request->package_name,];
        $response = Http::post($url, $data);

        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);

            if (empty($result['result'])) {
                return back()->with('error', 'Playstore data not found');
            }

            $playstoreResult = $result['result'];

            return view('pages/playstore-pages/playstore', ['playstore' => $playstoreResult]);
        } else {
            return back()->with('error', 'Package Name not found');
        }
    }
    // Playstore Controller END

    // News Controller START
    public function crawlNews()
    {
        $url = 'https://backend-crawler-t6ysugl5ra-et.a.run.app/crawl/news';
        $response = Http::get($url);

        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $newsResult = $result['result'];

            return view('pages/news-pages/news', ['news' => $newsResult]);
        } else {
            return back()->with('error', 'Failed to crawl news');
        }
    }
    // News Controller END
}
