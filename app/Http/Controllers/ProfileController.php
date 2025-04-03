<?php

namespace App\Http\Controllers;

use App\Models\User;


class ProfileController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('profile', ['users' => $users]);
    }
    
}
