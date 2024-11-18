<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Throwable;
class LocationController extends Controller
{

    function get() {
        return response()->json(['success' => Location::all()]);
    }

    function show(Request $request) {
        return response()->json(['success' => Location::find($request->id)]);
    }


    function create(Request $request) {

        $user = new Location();
        $user->name = $request->name;
        $user->save();

        return response()->json(['success' => 'Location create successfully']);
    }

    function update(Request $request) {

        Location::where('id', $request->id)->update([
            'name' => $request->name
        ]);

        return response()->json(['success' => 'Location update successfully']);
    }

    function delete(Request $request) {

        try {
            Location::where('id', $request->id)->delete();

            return response()->json(['success' => 'Location delete successfully']);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(500);
        }

    }

}
