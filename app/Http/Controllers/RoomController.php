<?php

namespace App\Http\Controllers;

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

        return view('room_details', compact('room'));
    }
}
