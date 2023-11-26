<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentiments;

class BarchartController extends Controller
{
    public function barchart(Request $request)
    {    	
        $positif = Sentiments::where('sentiment_type','0')->get();
        $negatif = Sentiments::where('sentiment_type','1')->get();
        $sentimentpositif_count = count($positif);     
        $sentimentnegatif_count = count($negatif);
        return view('barchart',compact('sentimentpositif_count','sentimentnegatif_count'));
    }
}
