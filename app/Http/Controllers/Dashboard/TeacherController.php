<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(6);
        return view('dashboard.categories.index', compact('teachers'));
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

        $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'categories');

        $category = Category::create($attributes);

        foreach ($request->categories ?? [] as $categoryId)
            Category::find($categoryId)->update($category->id);

        return redirect()->route('dashboard.categories.index')->with('success_message', 'The category has been Added successfully');

    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);
        return redirect()->route('dashboard.categories.index')->with('success_message', 'The category has been Added successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success_message', 'the category has been deleted successfully');

    }
}
