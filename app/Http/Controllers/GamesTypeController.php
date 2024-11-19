<?php

namespace App\Http\Controllers;

use App\Models\GameType;
use Illuminate\Http\Request;
use Throwable;
class GamesTypeController extends Controller
{

    function get() {
        return response()->json(['success' => GameType::all()]);
    }

    function show(Request $request) {
        return response()->json(['success' => GameType::find($request->id)]);
    }

    function create(Request $request) {

        $user = new GameType();
        $user->type = $request->type;
        $user->save();

        return response()->json(['success' => 'GameType create successfully']);
    }

    function update(Request $request) {

        GameType::where('id', $request->id)->update([
            'type' => $request->type
        ]);

        return response()->json(['success' => 'GameType update successfully']);
    }

    function delete(Request $request) {

        try {
            GameType::where('id', $request->id)->delete();

            return response()->json(['success' => 'GameType delete successfully']);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(500);
        }


    }
}
