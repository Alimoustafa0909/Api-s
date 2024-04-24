<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TeacherRequest;
use App\Models\Category;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(6);
        return view('dashboard.teachers.index', compact('teachers'));
    }

    public function show(Teacher $teacher)
    {
        return view('dashboard.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $teachers = Teacher::all();
        return view('dashboard.teachers.edit', compact('teacher', 'teachers'));
    }


    public function store(TeacherRequest $request)
    {

        $attributes = $request->validated();

        $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'teachers');

        $teacher = Teacher::create($attributes);

        foreach ($request->teachers ?? [] as $teacherID)
            Teacher::find($teacherID)->update($teacher->id);

        return redirect()->route('dashboard.teachers.index')->with('success_message', 'The teacher has been Added successfully');

    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('dashboard.teachers.create', compact('teachers'));
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $attributes = $request->validated();

        $teacher->update($attributes);
        return redirect()->route('dashboard.teachers.index')->with('success_message', 'The teacher has been Added successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('dashboard.teachers.index')->with('success_message', 'the teacher has been deleted successfully');

    }
}
