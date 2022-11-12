<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withTrashed()->latest()->paginate();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.form');
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if (Category::create($valid));
        return redirect(route('categories.index'))->with('success', 'category added Successfully');

        return redirect(route('categories.index'))->with('error', 'Somethings Went Wrong');
    }


    public function edit(Category $category)
    {
        return view('categories.form', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($category->update($valid));
        return redirect(route('categories.index'))->with('success', 'category added Successfully');

        return redirect(route('categories.index'))->with('error', 'Somethings Went Wrong');
    }


    public function destroy(Category $category)
    {
        if ($category->delete())
        return redirect()->back()->with('success', 'category deleted!');

    return redirect(route('categories.index'))->with('error', 'Somethings Went Wrong');
    }

    public function restore($category)
    {
        Category::withTrashed()->find($category)->restore();
        return redirect()->back()->with('success', 'category Restored!');
        return redirect(route('categories.index'))->with('error', 'Somethings Went Wrong');
    }
}
