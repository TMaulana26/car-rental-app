<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'plate_number', 'daily_rate', 'is_available', 'image_path'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('brand', 'like', "%{$search}%")
                     ->orWhere('model', 'like', "%{$search}%")
                     ->orWhere('plate_number', 'like', "%{$search}%");
    }
}
