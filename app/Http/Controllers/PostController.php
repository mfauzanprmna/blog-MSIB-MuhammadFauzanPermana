<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['id']) && $_GET['id'] != null) {
            $post = Post::where('category_id', $_GET['id'])->latest()->get();
        } else {
            $post = Post::latest()->get();
        }
        $category = Category::all();

        return view('posts.index', [
            'posts' => $post,
            'categories' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('posts.create', [
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|max:2048',
            'category_id'   => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('post', $validatedData['image']);
        }
        
        $validatedData['author_id'] = Auth::id();
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $post = Post::create($validatedData);

        if ($post) {
            return redirect()->route('mypost')->with('success', 'Post created successfully!');
        } else {
            return redirect()->route('mypost')->with('error', 'Failed to create post!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($request)
    {
        $post = Post::with(['category', 'author'])->where('slug', $request)->first();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|max:2048',
            'slug'          => 'required|string|max:255',
            'category_id'   => 'required|exists:categories,id',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $file = $request->file('image');
        if ($file) {
            if ($request->hasFile('image')) {
                $validatedData['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('post', $validatedData['image'], 'public');
            }
        }

        $post = Post::create($validatedData);

        if ($post) {
            return redirect()->route('mypost')->with('success', 'Post updated successfully!');
        } else {
            return redirect()->route('mypost')->with('error', 'Failed to update post!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('post/' . $post->image);
        }
        $delete = $post->delete();

        if ($delete) {
            return redirect()->route('mypost')->with('success', 'Post deleted successfully!');
        } else {
            return redirect()->route('mypost')->with('error', 'Failed to delete post!');
        }
    }
}
