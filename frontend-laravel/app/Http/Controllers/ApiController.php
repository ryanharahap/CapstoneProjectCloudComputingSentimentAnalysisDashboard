<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // Youtube Controller START
    public function crawlYoutube(Request $request)
    {
        $url = 'http://localhost:5001/crawl/youtube';
        $data = [
            'video_id' => $request->video_id,
        ];

        $response = Http::post($url, $data);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $youtubeResult = $result['result'];

            //$this->sendCrawlingResultToML($youtubeResult);

            return view('pages/youtube-pages/youtube', ['youtube' => $youtubeResult]);
        } else {
            // Tampilkan notifikasi error di frontend jika video_id tidak ditemukan
            return back()->with('error', 'Video Id not found');
        }
    }

    // public function sendCrawlingResultToML($crawlingResult)
    // {
    //     $mlEndpoint = 'http://backend-ml-url/endpoint';
    //     $data = [
    //         'crawling_result' => $crawlingResult,
    //         // Atau sesuaikan dengan struktur data yang dibutuhkan oleh backend ML
    //     ];

    //     $response = Http::post($mlEndpoint, $data);

    //     // Periksa apakah permintaan berhasil
    //     if (!$response->successful()) {
    //         // Tampilkan notifikasi error jika terjadi kesalahan
    //         // Anda juga bisa melakukan logging atau tindakan lainnya
    //         \Log::error('Failed to send crawling result to ML backend');
    //     }
    // }
    //Youtube Controller END

    // Playstore Controller START
    public function crawlPlaystore(Request $request)
    {
        $url = 'http://localhost:5001/crawl/playstore';
        $data = [
            'package_name' => $request->package_name,
        ];

        $response = Http::post($url, $data);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);

            if (empty($result['result'])) {
                // Tampilkan pesan kesalahan di halaman yang sama
                return back()->with('error', 'Playstore data not found');
            }

            $playstoreResult = $result['result'];

            return view('pages/playstore-pages/playstore', ['playstore' => $playstoreResult]);
        } else {
            // Tampilkan notifikasi error di frontend jika package_name tidak ditemukan
            return back()->with('error', 'Package Name not found');
        }
    }
    // Playstore Controller END

    // News Controller START
    public function crawlNews()
    {
        $url = 'http://localhost:5001/crawl/news';

        $response = Http::get($url);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            $result = json_decode($response->getBody(), true);
            $newsResult = $result['result'];

            return view('pages/news-pages/news', ['news' => $newsResult]);
        } else {
            // Tampilkan notifikasi error di frontend jika terjadi kesalahan saat mengambil berita
            return back()->with('error', 'Failed to crawl news');
        }
    }
    // News Controller END
}
