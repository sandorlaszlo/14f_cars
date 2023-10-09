<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    private $cars;
    private $headers;

    function __construct()
    {
        $this->cars = Storage::json('public/cars.json')["cars"];
        // dd($this->cars);

        // foreach ($this->cars[0] as $key => $value) {
        //     $this->headers[] = $key;
        // }

        $this->headers = array_keys($this->cars[0]);

        //dd($this->headers);
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
        ];
        return view('index', $data);
    }
}
