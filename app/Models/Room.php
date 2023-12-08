<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'details', 'is_available', 'image_path'
    ];
 
    public function category() : BelongsTo 
    {
        return $this->belongsTo(RoomCategory::class);
    }
}
