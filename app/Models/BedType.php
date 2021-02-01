<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    protected $fillable = ['hotel_id','name'];
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
