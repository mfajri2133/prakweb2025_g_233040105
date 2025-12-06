<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::where('user_id', auth()->user()->id);

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'excerpt' => 'required',
                'body' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],

            [
                'title.required' => 'The title field is required.',
                'title.max' => 'The title may not be greater than 255 characters.',
                'category_id.required' => 'The category field is required.',
                'category_id.exists' => 'The selected category is invalid.',
                'excerpt.required' => 'The excerpt field is required.',
                'body.required' => 'The body field is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts-images', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'required',
            'body'        => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->title !== $post->title) {

            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $slug;
        }

        if ($request->hasFile('image')) {

            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $validated['image'] = $request->file('image')->store('posts-images', 'public');
        }

        $post->update($validated);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Post updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Post has been deleted successfully.');
    }
}
