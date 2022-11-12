<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $sub_categories = SubCategory::with('category')->withTrashed()->latest()->paginate();
        return view('sub-categories.index', compact('sub_categories'));
    }


    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('sub-categories.form', compact('categories'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'category_id' => ['required'],
            'phn_no' => ['required', 'string', 'max:255'],
        ]);

        if (SubCategory::create($valid));
        return redirect(route('sub-categories.index'))->with('success', 'subCategory added Successfully');

        return redirect(route('sub-categories.index'))->with('error', 'Somethings Went Wrong');
    }


    public function edit(SubCategory $subCategory)
    {
        return view('sub_categories.form', compact('subCategory'));
    }


    public function update(Request $request, SubCategory $subCategory)
    {
        $valid = $request->validate([
            'category_id' => ['required'],
            'phn_no' => ['required', 'string', 'max:255'],
        ]);

        if ($subCategory->update($valid));
        return redirect(route('sub-categories.index'))->with('success', 'subCategory added Successfully');

        return redirect(route('sub-categories.index'))->with('error', 'Somethings Went Wrong');
    }


    public function destroy(SubCategory $subCategory)
    {
        if ($subCategory->delete())
        return redirect()->back()->with('success', 'subCategory deleted!');

    return redirect(route('sub-categories.index'))->with('error', 'Somethings Went Wrong');
    }

    public function restore($subCategory)
    {
        SubCategory::withTrashed()->find($subCategory)->restore();
            return redirect()->back()->with('success', 'subCategory Restored!');
        return redirect(route('sub-categories.index'))->with('error', 'Somethings Went Wrong');
    }
}
