<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\Guest;
use App\Models\Surname;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $guests = Guest::with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();
        
        return view("guest.list", [
            "guests"=> $guests,
            "surnames"=> $surnames,
            "cities"=> $cities,
            "categories"=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $guests = Guest::with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        return view("guest.create", [
            "guests"=> $guests,
            "surnames"=> $surnames,
            "cities"=> $cities,
            "categories"=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',   
            //'email' => 'required|email|unique:guest',            
        ]);

        if($validator->passes()){
            $guests = new Guest();
            $guests->name = $request->name;
            //$guests->email = $request->email;
            $guests->surname_id = $request->surname_id;
            $guests->city_id = $request->city_id;
            $guests->category_id = $request->category_id;
            $guests->event = $request->event;
            $guests->invitation = $request->invitation;
            $guests->food_choice = $request->food_choice;
            $guests->guest_type = $request->guest_type;
            //$guests->address = $request->address;
            $guests->save();

            return response()->json([
                'status' => true,
                'message' => 'Guest added successfully',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }            
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request){
        $guests = Guest::with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        return view('guest.edit',
        [
            "guests"=> $guests,
            "surnames"=> $surnames,
            "cities"=> $cities,
            "categories"=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
