<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index ()
    {
        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function store (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    public function destroy (Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
