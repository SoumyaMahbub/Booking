<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['user_id','name','description'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bed_types()
    {
        return $this->hasMany(BedType::class);
    }

    public function room_types()
    {
        return $this->hasMany(RoomType::class);
    }
}
