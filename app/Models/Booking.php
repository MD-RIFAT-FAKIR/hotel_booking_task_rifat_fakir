<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_category_id',
        'name',
        'email',
        'phone',
        'from_date',
        'to_date',
        'total_price',
    ];

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class);
    }
}
