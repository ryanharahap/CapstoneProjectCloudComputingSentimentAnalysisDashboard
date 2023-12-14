<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiController extends Controller
{
    // Youtube Controller START
    public function crawlYoutube(Request $request)
    {
        $url = 'https://sad-crawler-v2-t6ysugl5ra-as.a.run.app/crawl/youtube';
        $data = ['video_id' => $request->video_id,];
        $response = Http::post($url, $data);

        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $crawlResult = $result['result'];

            return $this->sendToYoutubeModel($crawlResult);
        } else {
            return back()->with('error', 'Video Id not found');
        }
    }

    private function sendToYoutubeModel($data)
    {
        $mlUrl = 'https://sad-backend-v2-t6ysugl5ra-as.a.run.app/predict/youtube';
        $mlData = ['data' => $data];

        $mlModelResponse = Http::post($mlUrl, $mlData);

        if ($mlModelResponse->successful()) {
            $result = json_decode($mlModelResponse->getBody(), true);
            $youtubeResult = $result['predictions'];

            return view('pages/youtube-pages/youtube', [
                'youtube' => $youtubeResult,
            ]);
        } else {
            return back()->with('error', 'Prediction Failed. Respons Timeout');
        }
    }
    //Youtube Controller END---------------------------------------------------------------------------------------


    // Playstore Controller START
    public function crawlPlaystore(Request $request)
    {

        $url = 'https://sad-crawler-v2-t6ysugl5ra-as.a.run.app/crawl/playstore';
        $data = ['package_name' => $request->package_name];
        $response = Http::post($url, $data);

        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $crawlResult = $result['result'];

            return $this->sendToPlaystoreModel($crawlResult);
        } else {
            return back()->with('error', 'Package Name not found');
        }
    }

    private function sendToPlaystoreModel($data)
    {
        $mlUrl = 'https://sad-backend-v2-t6ysugl5ra-as.a.run.app/predict/playstore';
        $mlData = ['data' => $data];

        $mlModelResponse = Http::post($mlUrl, $mlData);

        if ($mlModelResponse->successful()) {
            $result = json_decode($mlModelResponse->getBody(), true);
            $playstoreResult = $result['predictions'];

            return view('pages/playstore-pages/playstore', [
                'playstore' => $playstoreResult,
            ]);
        } else {
            return back()->with('error', 'Prediction Failed');
        }
    }
    // Playstore Controller END---------------------------------------------------------------------------------------


    // News Controller START
    public function crawlNews()
    {
        if (session()->has('newsData')) {
            $crawlResult = session('newsData');

        } else {
            $url = 'https://sad-crawler-v2-t6ysugl5ra-as.a.run.app/crawl/news';
            $response = Http::get($url);
    
            if ($response->successful()) {
                $result = json_decode($response->getBody(), true);
                $crawlResult = $result['result'];

                session(['newsData' => $crawlResult]);
            } else {
                return back()->with('error', 'Failed to crawl news');
            }
        }
    
        return $this->sendToNewsModel($crawlResult);
    }
    private function sendToNewsModel($data)
    {
        $mlUrl = 'https://sad-backend-v2-t6ysugl5ra-as.a.run.app/predict/news';
        $mlData = ['data' => $data];

        $mlModelResponse = Http::post($mlUrl, $mlData);

        if ($mlModelResponse->successful()) {
            $result = json_decode($mlModelResponse->getBody(), true);
            $newsResult = $result['predictions'];

            //pagination
            $currentPage = Paginator::resolveCurrentPage('page');
            $perPage = 10;

            $paginatedNews = new LengthAwarePaginator(
                array_slice($newsResult, ($currentPage - 1) * $perPage, $perPage),
                count($newsResult),
                $perPage,
                $currentPage,
                ['path' => Paginator::resolveCurrentPath()]
            );

            return view('pages/news-pages/news', [
                'news' => $paginatedNews,
            ]);
        } else {
            return back()->with('error', 'Prediction Failed');
        }
    }
    // News Controller END---------------------------------------------------------------------------------------
}
