<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'course_id',
        'quantity',
        'price',
        'course_name',
        'subtotal',
        'total',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    // Define relationships or other model methods here
}
