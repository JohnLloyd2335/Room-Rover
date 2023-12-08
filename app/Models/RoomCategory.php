<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'size', 'category', 'capacity', 'image_path'
    ];

    public function room() : HasMany 
    {
        return $this->hasMany(Room::class);
    }

}
