<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Lomba;
use App\Models\Topic;
use Illuminate\Http\Request;

class dashpageController extends Controller
{
    public function dashpage(){
        $posts = Post::paginate(10);
        $topics = Topic::all();
        $active = 'dashpage';
        $dropActive = '';
        return view('Masyarakat.dashpage', compact('posts', 'topics','active', 'dropActive'));
    }

    public function listlomba(){

        $lombas=Lomba::all();
        $active = 'dropdown';
        $dropActive = 'listLom';
        return view('Masyarakat.listlomba', compact('lombas','active','dropActive'));
    }
}