<?php

namespace App\Http\Controllers;

use App\Models\Blogcategory;
use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Blogcategory::all();
        return view('blogcategories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('blogcategories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Blogcategory::create(['name' => $request->name]);

        return redirect()->route('blogcategories.index')->with('success', 'Category added successfully.');
    }

    // Show form to edit a category
    public function edit($id)
    {
        $category = Blogcategory::findOrFail($id);
        return view('blogcategories.edit', compact('category'));
    }

    // Update the category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Blogcategory::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('blogcategories.index')->with('success', 'Category updated successfully.');
    }

    // Delete the category
    public function destroy($id)
    {
        $category = Blogcategory::findOrFail($id);
        $category->delete();

        return redirect()->route('blogcategories.index')->with('success', 'Category deleted successfully.');
    }
}



