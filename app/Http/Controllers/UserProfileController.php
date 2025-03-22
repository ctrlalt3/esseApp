<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function getProfile(){
        $user = Auth::user();
        $users = User::all();
        return view('profile', ['user'=>$user, 'users'=>$users]);
    }
}
