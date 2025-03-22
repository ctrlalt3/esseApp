<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function getSearch(){
        $users = User::whereIn('id', Auth::user()->following->pluck('id'))->get();
        $conversations = Conversation::all();
        return view('search', ['users'=>$users, 'conversations'=>$conversations]);
    }
    public function getSearchById($conversation_id){
        $users = User::whereIn('id', Auth::user()->following->pluck('id'))->get();
        $conversations = Conversation::all();
        $conversation = Conversation::find($conversation_id);
        $conversationUsers = Conversation::with('users')->find($conversation_id)->users;
        return view('editGroup', ['conversationUsers' => $conversationUsers,'users'=>$users,'conversations'=>$conversations, 'conversationUser' => $conversation]);
    }

    public function updateConversation(Request $request, $conversation_id){
        $conversation = Conversation::find($conversation_id);
        if($request->input('title')){
            $conversation->title = $request->input('title');
        }
        if($request->input('users')){
            $participants = $request->input('users');
            foreach($participants as $participant => $value){
                $conversation->users()->attach($value);
            }
        }
        $conversation->save();

        return redirect()->back();
    }
    public function createConversation(Request $request){
        $conversation = new Conversation(); 
        $conversation->title = $request->input('title');
        $conversation->save();
        $conversation->users()->attach(Auth::id());
        $participants = $request->input('users'); 
        
        foreach($participants as $participant => $value){
            $conversation->users()->attach($value);
        }
        
        $conversation->messages()->create([
            'user_id' => Auth::id(),
            'content' => $request->input('message')
        ]);

        $conversation->save();
        return redirect()->back();
    }

    public function deleteParticipant($conversation_id, $user_id){
        $conversation = Conversation::find($conversation_id);
        $conversation->users()->detach($user_id);
        return redirect()->back();
    }
}
