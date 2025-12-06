<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::query();

        if (request('search')) {
            $categories->where('name', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.categories.index', [
            'categories' => $categories->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
            ],

            [
                'name.required' => 'The name field is required.',
                'name.max' => 'The name may not be greater than 255 characters.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category has been deleted successfully.');
    }
}
