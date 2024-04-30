<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'duration',
        'lectures',
        'quizzes',
        'people_enrolled',
        'price',
        'image',
    ];

    public function instructor()
    {
        return $this->belongsTo(Teacher::class, 'instructor_id');
    }
    // Define any relationships or other methods here

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
