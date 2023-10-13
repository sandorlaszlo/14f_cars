<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    private $cars;
    private $headers;
    private $origins = array();

    function __construct()
    {
        $this->cars = Storage::json('public/cars.json')["cars"];
        // dd($this->cars);

        // foreach ($this->cars[0] as $key => $value) {
        //     $this->headers[] = $key;
        // }

        $this->headers = array_keys($this->cars[0]);
        //dd($this->headers);

        foreach ($this->cars as $car) {
            if (!in_array($car["Origin"], $this->origins))
            {
                $this->origins[] = $car["Origin"];
            }
        }
        // dd($this->origins);
    }

    function index(Request $request){
        //dd($request->all());

        if (isset($request['sort'])) {
            $sort = $request['sort'];
            usort($this->cars, function ($a, $b) use ($sort){
                if ($a[$sort] == $b[$sort] ) return 0;
                if ($a[$sort] > $b[$sort] ) return 1;
                return -1;
            });
        }

        $data =  [
            'cars' => $this->cars,
            'headers' => $this->headers,
            'origins' => $this->origins,
        ];
        return view('index', $data);
    }

    function searchByName(Request $request)
    {


        // $filteredCars = array();
        // foreach ($this->cars as $car) {
        //     if (str_contains(strtoupper($car["Name"]),strtoupper($request->carname)))
        //     {
        //         $filteredCars[] = $car;
        //         // array_push($filteredCars, $car);
        //     }
        // }

        $filteredCars = array_filter($this->cars, function ($car) use($request) {
            return str_contains(strtoupper($car["Name"]),strtoupper($request->carname));
        });

        $data =  [
            'cars' => $filteredCars,
            'headers' => $this->headers,
            'origins' => $this->origins,
        ];
        return view('index', $data);
    }

    function searchByOrigin(Request $request){
        $filteredCars = array_filter($this->cars, function ($car) use($request) {
            return str_contains(strtoupper($car["Origin"]),strtoupper($request->origin));
        });

        $data =  [
            'cars' => $filteredCars,
            'headers' => $this->headers,
            'origins' => $this->origins,
        ];
        return view('index', $data);
    }
}
