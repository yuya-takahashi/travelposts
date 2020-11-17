<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::OrderBy('id', 'desc')->paginate(10);
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $travelposts = $user->travelposts()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show', [
            'user' => $user,
            'travelposts' => $travelposts,
        ]);
    }
    public function favoritings($id)
    {
        $user = User::findOrFail($id);


        $travelposts = $user->favorites()->paginate(10);

        return view('users.favorites', [
            'user' => $user,
            'travelposts' => $travelposts,
        ]);
    }
}
