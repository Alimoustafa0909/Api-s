<?php

namespace App\Http\Controllers\Dashboard;
;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

use App\Models\Category;
use App\Models\Course;
use App\Models\Product;
use App\Models\Teacher;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(6);
        return view('dashboard.courses.index', compact('courses'));
    }

    public function store(CourseRequest $request)
    {
        $attributes = $request->validated();

        $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'courses');
        Course::create($attributes);

        return redirect()->route('dashboard.courses.index')->with('success_message', 'The course has been Added successfully');
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('dashboard.courses.create', compact('teachers'));
    }

    public function edit(Course $course)
    {
        return view('dashboard.products.edit', compact('course'));
    }

    public function update(CourseRequest $request , Course $course)
    {
        $attributes = $request->validated();
        if (request()->file('image'))
            $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'courses');

        $course->update($attributes);

        return redirect()->route('dashboard.courses.index')->with('success_message', 'The course has been Updated successfully');
    }

    public function show(Course $course)
    {
        return view('dashboard.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('dashboard.courses.index')->with('success_message', 'The course has been Deleted successfully');

    }
}