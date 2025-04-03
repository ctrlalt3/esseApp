<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Follower;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EsseController extends Controller
{
    public function getPosts(){
        $users = User::all();
        $posts = Post::with(relations: ['comments', 'likes'])
                ->whereIn('user_id', Auth::user()->following->pluck('id')->toArray())
                ->get();
        $conversations = Conversation::with('messages')->get();
        return view('dashboard',['posts'=> $posts, 'users'=>$users, 'conversations'=>$conversations]);
    }
    public function getPost($id){
        $users = User::all();
        $posts = Post::with(['comments', 'likes'])
                ->whereIn('user_id', Auth::user()->following->pluck('id')->toArray())
                ->get();
        $conversations = Conversation::with('messages')
                ->whereHas('users', function($query) {
                    $query->where('users.id', Auth::id()); // Filtra por el usuario autenticado
                })
                ->get();
        $conversation = Conversation::find($id);
        $messages = $conversation->messages;
        return view('dashboard', ['messages'=>$messages,'posts'=> $posts, 'users'=>$users, 'conversations'=>$conversations]);
    }
    public function getSearch(){
        $users = User::all();
        $conversations = Conversation::all();
        return view('search', ['users'=>$users, 'conversations'=>$conversations]);
    }
    public function followUser($id){
        $followers = new Follower();
        $followers->follower_id = Auth::id();
        $followers->followed_id = $id;
        $followers->save();

        return redirect()->back();
    }
    public function unfollowUser($id){
        Follower::where('follower_id', Auth::id())
                ->where('followed_id', $id)
                ->delete();
                
        return redirect()->back();
    }
    public function sendMessage($conversation_id){
        $message = new Message();
        $message->conversation_id = $conversation_id;
        $message->user_id = Auth::id();
        $message->content = request('message');
        $message->save();
        return redirect()->back();
    }
    
}
