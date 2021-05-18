<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $users = User::with('role')->orderBy('id', 'desc')->paginate(12);
        return view('admin.user',compact('users'));
    }

    public function edit(User $user){
        return view('admin.edit',compact('user'));
    }

    public function update(User $user,Request $request){
        $data=$request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'nullable',
        ]);

        $user->update($data);
        return redirect()->route('index')->with('success', 'User  details has been updated successfuly!');
    }

    public function delete(User $user){
        return view('admin.delete',compact('user'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('index')->with('success', 'User  details has been deleted successfuly!');
    }
}
