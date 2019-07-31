<?php

namespace App\Http\Controllers;

use ConsoleTVs\Charts\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WelcomeController extends Controller
{
    public function index()
    {
        $chart1 = Charts::realtime(route('data'), 1000, 'gauge', 'google')
            ->setResponsive(false)
            ->setHeight(260)
            ->setWidth(0)
            ->setTitle('')
            ->setElementLabel('Celcius')
            ->setValueName('temp');

        return view('monitor', ['chart1' => $chart1]);
    }

    public function write(Request $request){
        $pathFile = storage_path('app/public/data.json');

        File::put($pathFile, json_encode([
            "temp" => $request->input("temp"),
            "ph" => $request->input("ph"),
            "high" => $request->input("high"),
            "quality" => $request->input("q"),
            "heater" => $request->input("heater"),
        ]));
    }
}
