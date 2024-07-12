<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dokumentasi()
    {
        $posts = Post::paginate(10);
        return view('panitia.dokumentasi', compact('posts'));
    }

    public function createPost()
    {
        return view('posts.create');
    }

    public function storePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->link = $request->link;
        $post->save();

        return redirect()->route('dokumentasi')->with('success', 'Post created successfully.');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->link = $request->link;
        $post->save();

        return redirect()->route('dokumentasi')->with('success', 'Post updated successfully.');
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dokumentasi')->with('success', 'Post deleted successfully.');
    }
}
