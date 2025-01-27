<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function city(){
        $cities = City::all();

        //dd($cities);

        return view("city", [
            "cities" => $cities
        ]);
    }

    public function store(Request $request){
        $city = new City();
        $city->name = $request->name;
        $city->save();
    }
}
