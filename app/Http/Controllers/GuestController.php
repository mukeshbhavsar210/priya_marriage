<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\Guest;
use App\Models\Surname;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{

    public function viewHome () {
        $guests = Guest::with('photo')->with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        $data['guests'] = $guests;
        $data['surnames'] = $surnames;
        $data['cities'] = $cities;
        $data['categories'] = $categories;                  
        
        return view("front.index", $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $guests = Guest::with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        $data['guests'] = $guests;
        $data['surnames'] = $surnames;
        $data['cities'] = $cities;
        $data['categories'] = $categories;
        
        return view("admin.guest.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $guests = Guest::with('surname')->with('city')->with('category')->get();
        $surnames = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        return view("admin.guest.create", [
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
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder store
        $request->image->storeAs('photos', $imageName);

        if($validator->passes()){
            $guests = new Guest();
            $guests->name = $request->name;
            $guests->surname_id = $request->surname_id;
            $guests->city_id = $request->city_id;
            $guests->category_id = $request->category_id;
            $guests->event = $request->event;
            $guests->invitation = $request->invitation;
            $guests->food_choice = $request->food_choice;
            $guests->guest_type = $request->guest_type;
            $guests->save();

            //basic Upload image
            if($request->hasfile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('photos/', $filename);
                $guests->image = $filename;
                $guests->save();
            }

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
        $guest = Guest::find($id);
        $surname = Surname::get();
        $cities = City::get();
        $categories = Category::get();

        $data['guest'] = $guest;
        $data['surname'] = $surname;
        $data['cities'] = $cities;
        $data['categories'] = $categories;

        return view('admin.guest.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request){
        $guest = Guest::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',          
        ]);

        if($validator->passes()){
            $guest->name = $request->name;
            $guest->surname_id = $request->surname_id;
            $guest->city_id = $request->city_id;
            $guest->category_id = $request->category_id;
            $guest->event = $request->event;
            $guest->invitation = $request->invitation;
            $guest->food_choice = $request->food_choice;
            $guest->guest_type = $request->guest_type;
            $guest->save();

            return response()->json([
                'status' => true,
                'message' => 'Guest updated successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request){
        $guest = Guest::find($id);
        $guest->delete();

        $request->session()->flash('success', 'Guest deleted successfully');

        return response([
            'status' => true,
            'message' => 'Guest deleted successfully',
        ]);
    }
}
