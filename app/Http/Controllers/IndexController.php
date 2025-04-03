<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getInfo(){
        $posts = Post::all();
        $users = User::all();
        return view('index',['posts'=> $posts ,'users'=> $users]);
    }
    
}
