<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class UserTopicController extends Controller
{
    public function showTopic($id)
    {
        $topic = Topic::findOrFail($id);
        return view('user.topics.show', compact('topic'));
    }
}
