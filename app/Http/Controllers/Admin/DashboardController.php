<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class DashboardController extends Controller{
    public function index(){
       
        switch(Auth::user()->role->name){
            case 'Admin':
                $users = User::count();
                $posts = Post::count();
            return view('admindashboard',compact('users','posts'));
                break;
            case 'Editor':
            return view('editordashboard');
                break;
            case'Publisher':
            return view('publisherdashboard');
                break;
            case'Writer':
            return view('writerdashboard');
                break;
        }
    }

}
