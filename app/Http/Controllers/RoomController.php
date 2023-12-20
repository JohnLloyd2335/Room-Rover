<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('room');
    }

    public function show($id)
    {
        $room = Room::with('category')->findOrFail($id);

        $room_avg = Rating::where('room_id',$id)->avg('rating') ?? 0;

        return view('room_details', compact('room','room_avg'));
    }
}
