<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    // Methods for Topics
    public function informasi()
    {
        $topics = Topic::all();
        $active = 'dashboard';
        $dropActive = '';
        return view('panitia.dashboard', compact('topics', 'active','dropActive'));
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

        $imagePath = $request->file('image')->store('topics', 'public');

        $topic = new Topic();
        $topic->judul = $request->judul;
        $topic->image = $imagePath;
        $topic->save();

        return redirect()->route('dashboard')->with('success', 'Topic created successfully.');
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
            $imagePath = $request->file('image')->store('topics', 'public');
            $topic->image = $imagePath;
        }

        $topic->save();

        return redirect()->route('dashboard')->with('success', 'Topic updated successfully.');
    }

    // Method to show details of a topic
    public function showTopic($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.show', compact('topic'));
    }

    public function destroyTopic($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('dashboard')->with('success', 'Topic deleted successfully.');
    }
}
