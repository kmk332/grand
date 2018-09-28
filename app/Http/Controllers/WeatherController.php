<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

class WeatherController extends Controller
{
    public function index()
    {
      $weather = weather::orderBy('id', 'desc')->take(1)->get();
      return view('weather.index', compact('weather'));
    }

    // public function getWeather($zip){
    //   $weather = weather::where('zip', '=', $zip)->first();
    //   return response()->json($weather);
    // }

    // public function postNewWeather(){
    //   $weather = new Weather();
    //   $weather->zip   = Request::get('zip');
    //   $weather->main = Request::get('main');
    //   $weather->description = Reqeust::get('description');
    //   $weather->save();
    //   return response()->json($weather, 201);
    // }

    public function store(Request $request)
    {
      function curl($url) {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
          $data = curl_exec($ch);
          curl_close($ch);
          return $data;
      }

      $weather = new Weather();
      $weather->zip = $request->zip;
      $urlContents = curl("http://api.openweathermap.org/data/2.5/weather?zip=".$request->zip."&type=accurate&appid=b990ab9a78c305a49e059660f01d604b");
      $weatherArray = json_decode($urlContents, true);
      if ($weatherArray['cod'] == 200){
        $temp = intval($weatherArray['main']['temp']* 9/5 - 459.67);
        $finalWeather = "The weather in ".$weatherArray['name']." is currently ".$weatherArray['weather'][0]['description'].". The temperature is ".$temp."&deg; F.";
        $weather->finalWeather = $finalWeather;
        $weather->save();
        return redirect('weather');
      } else {
        return (new \Illuminate\Http\Response)->setStatusCode(418);
      }

    }
}
