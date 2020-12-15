<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Storage;

use Auth;

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
    public function favorites($id)
    {
        $user = User::findOrFail($id);


        $travelposts = $user->favorites()->paginate(10);

        return view('users.favorites', [
            'user' => $user,
            'travelposts' => $travelposts,
        ]);
    }
    
    public function profile() {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }
    
    
    
    public function edit($id) {
        $user = Auth::user();
        
        if (Auth::id() != $user->id) {
            return redirect('/');
        }
        else{
            return view('users.edit', ['user' => $user]);
        }
    }

    public function update($id, Request $request) {
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        
        $user = Auth::user();
        $form = $request->all();

        $user->comment = $request->comment;
        
        $profileImage = $request->file('profile_image');
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
    
        
        
        return redirect()->route("users.show", ['user' => $user]);
    }
    
    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }
}
