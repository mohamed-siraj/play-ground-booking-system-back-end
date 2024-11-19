<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    function get(Request $request) {
        return response()->json(['success' => Message::where('ground_admin_id', 'LIKE','%' . $request->query('user_id') . '%')->get()]);
    }

    function show(Request $request) {
        return response()->json(['success' => Message::find($request->id)]);
    }

    function create(Request $request) {

        $message = new Message();
        $message->ground_id = $request->ground_id;
        $message->ground_admin_id = $request->ground_admin_id;
        $message->message = $request->message;
        $message->save();

        return response()->json(['success' => 'Message create successfully']);

    }
}
