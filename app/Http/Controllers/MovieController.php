<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index() {
        $baseURL      = env('MOVIE_DB_BASE_URL');
        $imageBaseURl = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey       = env('MOVIE_DB_API_KEY');
        $max_image    = 3;

        // Mengambil/hit API untuk banner
        $bannerResponse = Http::get("{$baseURL}/trending/movie/week", ['api_key'=> $apiKey]);

        // Persiapan variable
        $bannerArray=[];

        // check API response
        if($bannerResponse->successful()){
            $resultArray =$bannerResponse->object()->results;
            if(isset($resultArray)){
                //Looping data image
                foreach($resultArray as $item) {
                    array_push($bannerArray, $item);
                    if(count($bannerArray) == $max_image) {
                        break;
                    }
                }
            }
        }
        return view('home' ,[
            'baseURL'      => $baseURL,
            'imageBaseURL' => $imageBaseURl,
            'apiKey'       => $apiKey,
            'banner'       => $bannerArray
]);
}
}