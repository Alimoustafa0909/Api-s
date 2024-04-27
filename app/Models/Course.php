<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
