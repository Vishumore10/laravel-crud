<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a list of posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    // Display a specific post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form to edit a post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update a post in the database
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    // Delete a post from the database
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}

