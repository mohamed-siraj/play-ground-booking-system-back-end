<?php

namespace App\Http\Controllers;

use App\Models\GameType;
use Illuminate\Http\Request;

class GamesTypeController extends Controller
{
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

        GameType::where('id', $request->id)->delete();

        return response()->json(['success' => 'GameType delete successfully']);
    }
}
