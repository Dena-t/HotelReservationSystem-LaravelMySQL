<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function getWeather(Request $request)
    {
        $location = $request->input('location');
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=' . urlencode($location) . '&appid=c480b8a9648bb7c45d2b70f5c330b966');
            
            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);
                $temperature = $data['main']['temp'] - 273.15;
                $description = $data['weather'][0]['description'];
                $icon = $data['weather'][0]['icon'];
                
                return redirect()->back()->with([
                    'location' => $location,
                    'temperature' => $temperature,
                    'description' => $description,
                    'icon' => $icon
                ]);
            } else {
                return redirect()->back()->with('error', 'Unable to fetch weather data');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching weather data');
        }
    }
}
