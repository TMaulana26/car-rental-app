<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'start_date', 'end_date', 'total_cost', 'status'];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereHas('car', function ($carQuery) use ($search) {
            $carQuery->where('brand', 'like', "%{$search}%")
                     ->orWhere('model', 'like', "%{$search}%")
                     ->orWhere('plate_number', 'like', "%{$search}%");
        });
    }
}
