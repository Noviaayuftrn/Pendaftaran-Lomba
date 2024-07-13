<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function dataAdmin(){
        return view('panitia.dataadmin', [
            'Users' => User::all(),
            'active' => 'dataAdmin',
            'dropActive' => ''
        ]);
    }
}
