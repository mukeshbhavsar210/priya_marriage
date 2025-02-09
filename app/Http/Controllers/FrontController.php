<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Guest;
use App\Models\Surname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function city(){
        $cities = City::get();

        //dd($cities);

        return view("admin.city", [
            "cities" => $cities
        ]);
    }

    public function store_city (Request $request){
        $city = new City();
        $city->name = $request->name;
        $city->save();
    }              
}
