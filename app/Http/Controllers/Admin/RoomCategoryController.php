<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomCategory\StoreRoomCategoryRequest;
use App\Http\Requests\Admin\RoomCategory\UpdateRoomCategoryRequest;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomCategoryController extends Controller
{
    public function index() 
    {
        return view('admin.room_category.index');
    }

    public function create()
    {
        return view('admin.room_category.create');
    }

    public function store(StoreRoomCategoryRequest $request) 
    {
        $validated = $request->validated($request->all());

        DB::beginTransaction();

        try {
            $room_category = RoomCategory::create([
                'name' => $request->name,
                'price' => $request->price,
                'size' => $request->size,
                'capacity' => $request->capacity
            ]);
    
            if($room_category)
            {
                if($request->hasFile('image'))
                {
                    $extension = $request->image->getClientOriginalExtension();
                    $file_name = time()."_room_category_".$room_category->id.".".$extension;
                    $request->image->storeAs('public/room_category_images',$file_name);
    
                    $room_category->update([
                        'image_path' => "room_category_images/".$file_name
                    ]);
                }
            }
            
            DB::commit();

            return redirect()->route('admin.room_category.index')->with('success', 'Room Category Successfully Added');
        } catch (\Exception $ex) {
           
            DB::rollBack();

            return redirect()->route('admin.room_category.index')->with('error', 'There was an error');
        }
    }

    public function edit($id)
    {

        $category = RoomCategory::findOrFail($id);

        return view('admin.room_category.edit', compact('category'));

    }

    public function update(UpdateRoomCategoryRequest $request, RoomCategory $category)
    {

        $validated = $request->validated($request->all());

        DB::beginTransaction();

        try {
            $category->update([
                'name' => $request->name,
                'price' => $request->price,
                'size' => $request->size,
                'capacity' => $request->capacity,
            ]);
        
            DB::commit();
        
            return redirect()->route('admin.room_category.index')->with('success', 'Room Category Successfully Updated');
        } catch (\Exception $ex) {
            DB::rollback();
        
            return redirect()->route('admin.room_category.index')->with('error', 'There was an error');
        }
        
    }
}
