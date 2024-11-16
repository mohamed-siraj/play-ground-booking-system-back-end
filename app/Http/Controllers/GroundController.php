<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller
{

    function get() {

        return response()->json(['success' => Ground::all()]);

    }

    function create(Request $request) {

        // Handle the upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique name for the image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save the image to the public/images directory
            $image->move(public_path('images'), $imageName);

            // Image URL can be accessed using asset() helper
            $imageUrl = asset('images/' . $imageName);

            $user = new Ground();
            $user->name = $request->name;
            $user->game_type_id = $request->game_type_id;
            $user->location_id = $request->location_id;
            $user->location_address = $request->location_address;
            $user->level = $request->level;
            $user->surrounding = $request->surrounding;
            $user->per_day_price = $request->per_day_price;
            $user->available_day_from = $request->available_day_from;
            $user->available_day_to = $request->available_day_to;
            $user->description = $request->description;
            $user->ground_admin_id = $request->ground_admin_id;
            $user->image_1 = $imageUrl;
            $user->save();

            return response()->json(['success' => 'Ground create successfully']);
        }


    }

    function update(Request $request) {

        $ground = Ground::find($request->id);

        if($request->name){
            $ground->name = $request->name;
        }

        if($request->game_type_id){
            $ground->game_type_id = $request->game_type_id;
        }

        if($request->location_id){
            $ground->location_id = $request->location_id;
        }

        if($request->location_address){
            $ground->location_address = $request->location_address;
        }

        if($request->level){
            $ground->level = $request->level;
        }

        if($request->surrounding){
            $ground->surrounding = $request->surrounding;
        }

        if($request->per_day_price){
            $ground->per_day_price = $request->per_day_price;
        }

        if($request->available_day_from){
            $ground->available_day_from = $request->available_day_from;
        }

        if($request->available_day_to){
            $ground->available_day_to = $request->available_day_to;
        }

        if($request->description){
            $ground->description = $request->description;
        }

        if($request->ground_admin_id){
            $ground->ground_admin_id = $request->ground_admin_id;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique name for the image
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save the image to the public/images directory
            $image->move(public_path('images'), $imageName);

            // Image URL can be accessed using asset() helper
            $imageUrl = asset('images/' . $imageName);

            $ground->image_1 = $imageUrl;
        }

        $ground->save();

        return response()->json(['success' => 'Ground update successfully']);
    }

    function delete(Request $request) {

        Ground::where('id', $request->id)->delete();

        return response()->json(['success' => 'Ground delete successfully']);
    }
}
