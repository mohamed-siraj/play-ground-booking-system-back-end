<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Throwable;
class UserController extends Controller
{
    function register(Request $request) {

        if(User::where('email', $request->email)->where('user_type',$request->user_type)->first()){
            return response()->json(['error' => 'User already available'])->setStatusCode(500);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();

        return response()->json(['success' => 'User create successfully']);
    }

    function login(Request $request) {

        if (!Auth::attempt(['email' => $request->email,'user_type' => $request->user_type, 'password' => $request->password])) {
            return response()->json(['error' => 'User credentials is not match'])->setStatusCode(404);
        }

        return response()->json(User::where('email', $request->email)->where('user_type',$request->user_type)->first());
    }

    function get(Request $request) {
        return response()->json(['success' => User::where('user_type', '!=', 'super_admin')
        ->where('user_type', 'LIKE', '%' . $request->query('user_type') . '%')->get()]);
    }

    function show(Request $request) {
        return response()->json(['success' => User::find($request->id)]);
    }

    function update(Request $request) {

        $user = User::find($request->id);

        if($request->name){
            $user->name = $request->name;
        }

        if($request->user_type){
            $user->user_type = $request->user_type;
        }

        if($request->phone_number){
            $user->phone_number = $request->phone_number;
        }

        if($request->address){
            $user->address = $request->address;
        }

        $user->save();

        return response()->json(['success' => 'User update successfully']);
    }

    function delete(Request $request) {

        try {
            User::where('id', $request->id)->delete();

            return response()->json(['success' => 'Location delete successfully']);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()])->setStatusCode(500);
        }

    }
}
