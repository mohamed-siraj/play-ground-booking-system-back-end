<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function get(Request $request) {
        return response()->json(['success' => Booking::where('ground_admin_id', 'LIKE','%' . $request->query('ground_admin_id') . '%')
        ->where('customer_id', 'LIKE','%' . $request->query('customer_id') . '%')->get()]);
    }

    function show(Request $request) {
        return response()->json(['success' => Booking::find($request->id)]);
    }

    function create(Request $request) {

        $uniqueId = Str::uuid()->toString();

        $book = new Booking();
        $book->booking_id = $uniqueId;
        $book->ground_id = $request->ground_id;
        $book->booking_date_from = $request->booking_date_from;
        $book->booking_date_to = $request->booking_date_to;
        $book->total_amount = $request->total_amount;
        $book->customer_id = $request->customer_id;
        $book->ground_admin_id = $request->ground_admin_id;
        $book->ground_admin_id = $request->ground_admin_id;
        $book->guest_name = $request->guest_name;
        $book->guest_phone_number = $request->guest_phone_number;
        $book->notification_status = 'unview';
        $book->status = 'pending';
        $book->save();

        return response()->json(['success' => 'Book create successfully']);

    }

    // function update(Request $request) {

    //     Booking::where('id', $request->id)->update([
    //         'name' => $request->name
    //     ]);

    //     return response()->json(['success' => 'Location update successfully']);
    // }

}
