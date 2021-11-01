<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required|min:5|max:255',
            'desc'      => 'required|string|min:15'
        ]);

        $post = new Post($request->except('user_id'));
        $post->user_id = auth()->user()->id;
        $post->save();

        toastSuccess('Post added successfully', "Success!");

        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|min:5|max:255',
            'desc'      => 'required|string|min:15'
        ]);

        $post = Post::find($id);
        $post->update($request->except(['_token', '_method']));

        toastSuccess('Post updated successfully', "Success!");

        return redirect()->route('post.index');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();

        toastInfo('Post deleted successfully', "Success!");

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function like($id)
    {
        $post = Post::find($id);
        $post->likes()->save(new Like);

        return redirect()->back();
    }
}
