<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $room_categories = RoomCategory::all();

        return view('index',compact('room_categories'));
    }
}
