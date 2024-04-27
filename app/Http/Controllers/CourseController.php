<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $courses = Course::all();
        return CourseResource::collection($courses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CourseResource
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return new CourseResource($course);
    }
}
