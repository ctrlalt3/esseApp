<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(Request $request){
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->content = $request->input('content');    
        
        // Guardar el archivo primero
        $fileName = $post->title . '.' . $extension;        
        $post->url = '/storage/' . $fileName;
        
        $post->save();

        $file->storeAs('', $post->title . "." . $extension, 'public');
        
        // Asignar la URL correcta

        return redirect()->back();
    }
    public function findPost($id){
        $post = Post::find($id);
        return view('createPost', ['post_user'=> $post]);
    }
    public function updatePost(Request $request ,$id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');    
        if(!isset($file)){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = $post->title . '.' . $extension;        
            $file->storeAs('', $post->title . "." . $extension, 'public');
            $post->url = '/storage/' . $fileName;
        }
        $post->save();

        
        // Asignar la URL correcta

        return redirect()->back();
    }
    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function likePost($id){
        $like = new Like();
        $like->post_id = $id;
        $like->user_id = Auth::id();
        $like->save();

        return redirect()->back();
    }
    public function disLikePost($id){
        Like::where('post_id', $id)
        ->where('user_id', Auth::id())
        ->delete();
        
        return redirect()->back();
    }
    public function commentPost($id){
        $comment = new Comment();
        $comment->post_id =$id;
        $comment->user_id = Auth::id();
        $comment->comment = request('comment');
        $comment->save();
        return redirect()->back();
    }
}
