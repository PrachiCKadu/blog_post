<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
public function index() {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
}

public function create() {
    return view('posts.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    Post::create([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

// Show the edit form with current post data
public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

// Update post in database
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $post->update($request->only('title', 'description'));

    return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
}

// Delete post from database
public function destroy(Post $post)
{
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}

}
