<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class YoutubeController extends Controller
{
    private $api_key;

    public function __construct()
    {
        $this->api_key = 'AIzaSyBFEjt_AUqGSN1NueASUZAw0PjcWxXnFcw';
    }

    public function getPopularVideos()
    {
        $client = new Client();

        $response = $client->get("https://www.googleapis.com/youtube/v3/videos", [
            'query' => [
                'part' => 'snippet,contentDetails,statistics',
                'chart' => 'mostPopular',
                'regionCode' => 'ID', // Kode wilayah untuk Indonesia
                'maxResults' => 12,
                'key' => $this->api_key,
            ],
        ]);

        $videos = json_decode($response->getBody()->getContents(), true);

        return view('/pages/trending-yt', compact('videos'));
    }

    public function getVideoComments(Request $request)
    {
        $apiKey = 'AIzaSyBFEjt_AUqGSN1NueASUZAw0PjcWxXnFcw';
        $client = new Client();
        
        $videoId = $request->input('video_id');

        if (!$videoId) {
            // Handle jika ID video tidak ada
            return redirect('/')->with('error', 'Please enter a YouTube video ID.');
        }

        $response = $client->get("https://www.googleapis.com/youtube/v3/commentThreads", [
            'query' => [
                'part' => 'snippet',
                'videoId' => $videoId,
                'maxResults' => 10, // Ganti sesuai kebutuhan Anda
                'key' => $apiKey,
            ],
        ]);

        $comments = json_decode($response->getBody()->getContents(), true);

        return view('pages/youtube-pages/youtube', compact('comments'));
    }
}