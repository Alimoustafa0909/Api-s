<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }


    public function store(CategoryRequest $request)
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
