<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Room\StoreRoomRequest;
use App\Http\Requests\Admin\Room\UpdateRoomRequest;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index');
    }

    public function create()
    {

        $room_categories = RoomCategory::pluck('name', 'id');

        return view('admin.room.create', compact('room_categories'));
    }

    public function store(StoreRoomRequest $request)
    {
        $validated = $request->validated($request->all());

        DB::beginTransaction();

        try {
            $room = Room::create([
                'category_id' => $request->category,
                'name' => $request->name,
                'details' => $request->details,
            ]);

            if ($room) {
                if ($request->hasFile('image')) {
                    $extension = $request->image->getClientOriginalExtension();
                    $file_name = time() . '_room_' . $room->id . '.' . $extension;

                    $request->image->storeAs('public/room_images', $file_name);

                    $room->update([
                        'image_path' => 'room_images/' . $file_name
                    ]);
                }

                DB::commit();
                return redirect()->route('admin.room.index')->with('success', 'Room Successfully Added');
            }
        } catch (\Exception $ex) {

            DB::rollBack();

            return redirect()->route('admin.room.index')->with('error', 'There was an error');
        }
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        $room_categories = RoomCategory::pluck('name', 'id');


        return view('admin.room.edit', compact('room', 'room_categories'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $validated = $request->validated($request->all());

        DB::beginTransaction();

        try {
            $room->update([
                'name' => $request->name,
                'details' => $request->details,
                'is_available' => $request->availability ? 0 : 1,
                'category_id' => $request->category
            ]);

            DB::commit();

            return redirect()->route('admin.room.index')->with('success', 'Room Successfully Updated');
        } catch (\Exception $th) {
            DB::rollBack();

            return redirect()->route('admin.room.index')->with('error', 'There was an Error');
        }
    }
}
