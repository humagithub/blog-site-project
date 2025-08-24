<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory; // Import your BlogCategory model

class BlogCategoryPostController extends Controller
{
    public function index()
    {
        // Fetch categories from the database (adjust table/column names as necessary)
        $categories = BlogCategory::all(); // Fetch all categories from the database

        return view('blogcategorypost.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // Save the category to the database
        BlogCategory::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }
}


