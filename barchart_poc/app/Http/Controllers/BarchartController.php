<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentiment;

class BarchartController extends Controller
{
    public function barchart(Request $request)
    {    	
        $positif = Sentiment::where('sentiment_type','positif')->get();
        $negatif = Sentiment::where('sentiment_type','negatif')->get();
        $netral = Sentiment::where('sentiment_type','netral')->get();
        $sentimentpositif_count = count($positif);     
        $sentimentnegatif_count = count($negatif);
        $sentimentnetral_count = count($netral);
        return view('barchart',compact('sentimentpositif_count','sentimentnegatif_count','sentimentnetral_count'));
    }
}
