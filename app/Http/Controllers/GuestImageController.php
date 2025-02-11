<?php

namespace App\Http\Controllers;

use App\Models\GuestImage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class GuestImageController extends Controller
{
    public function update(Request $request){

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $sourcePath = $image->getPathName();

        $guestPhoto = new GuestImage();
        $guestPhoto->guest_id = $request->guest_id;
        $guestPhoto->image = "NULL";
        $guestPhoto->save();

        $imageName = $request->guest_id.'-'.time().'.'.$ext;
        $guestPhoto->image = $imageName;
        $guestPhoto->save();

        //Generate Product Thumbnails
        $destPath = public_path().'/uploads/photos/'.$imageName;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($sourcePath);
        $image->cover(300,300);
        $image->save($destPath);

        return response()->json([
            'status' => true,
            'image_id' => $guestPhoto->id,
            'ImagePath' => asset('uploads/photos/'.$guestPhoto->image),
            'message' => 'Image saved successfully'
        ]);
    }


    
    public function destroy(Request $request){
        $productImage = GuestImage::find($request->id);

        if (empty($productImage)){
            return response()->json([
                'status' => false,
                'message' => 'Image not found'
            ]);
        }

        //Delete images from folder
        File::delete(public_path('uploads/photos/'.$productImage->image));
        File::delete(public_path('uploads/photos/'.$productImage->image));

        //Delete images from database
        $productImage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
