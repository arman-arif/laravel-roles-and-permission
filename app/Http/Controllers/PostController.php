<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:10|max:255',
            'desc'      => 'required|string|min:15'
        ]);

        $post = new Post($request->except('user_id'));
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post saved successfully!');
    }
}
