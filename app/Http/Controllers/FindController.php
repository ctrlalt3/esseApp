<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('followView', ['users' => $users]);
    }
}
