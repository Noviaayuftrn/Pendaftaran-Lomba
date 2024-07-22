<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Session;


class CombinedController extends Controller
{
    public function showDashboard()
    {
        $posts = Post::paginate(10); // Menggunakan paginate untuk pagination
        $topics = Topic::all();

        return view('panitia.dashboard', compact('posts', 'topics'));
    }
}

class TopicController extends Controller
{
    // Methods for Topics
    public function indexTopics()
    {
        $topics = Topic::paginate(10);
        return view('panitia.dashboard', compact('topics'));
    }

    public function createTopic()
    {
        return view('topics.create');
    }

    public function storeTopic(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('storage', 'public');

        $topic = new Topic();
        $topic->judul = $request->judul;
        $topic->image = $imagePath;
        $topic->save();

        return redirect()->route('topics.dashboard')->with('success', 'Topic created successfully.');
    }

    public function editTopic($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.edit', compact('topic'));
    }

    public function updateTopic(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'image|max:2048',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->judul = $request->judul;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('storage', 'public');
            $topic->image = $imagePath;
        }

        $topic->save();

        return redirect()->route('topics.dashboard')->with('success', 'Topic updated successfully.');
    }

    // Method to show details of a topic
    public function showTopic($id)
    {
        $topic = Topic::findOrFail($id);
        return view('panitia.dashboard', compact('topic'));
    }

    public function destroyTopic($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topics.dashboard')->with('success', 'Topic deleted successfully.');
    }
}    

class PostController extends Controller
{
    // Methods for Posts
    public function indexPosts()
    {
        $posts = Post::paginate(10);
        return view('panitia.dashboard', compact('posts'));
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

        return redirect()->route('posts.dashboard')->with('success', 'Post created successfully.');
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

        return redirect()->route('posts.dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.dashboard')->with('success', 'Post deleted successfully.');
    }
}
