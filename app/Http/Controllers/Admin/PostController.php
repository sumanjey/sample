<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class PostController extends Controller
{   public function index(){
    $this->authorize('index',new User);
        $posts = post::with('user')->orderBy('id', 'desc')->paginate(12);
        return view('admin.post.index',compact('posts')); 
    }

    public function create(){
        return view('admin.post.create');
    }

    public function store(PostStoreRequest $request){
        $data = $request->validated();
        $user = Auth::user()->id;
        post::create([
            'user_id' => $user,
            'heading' => $data['heading'],
            'content' => $data['content']
            
        ]);
        return redirect()->route('post.index')->with('success', 'post has been created successfully!');;

    }

    
    public function show(Post $post){
        $post->load('user');
                return view('admin.post.show',compact('post'));
    }

    public function edit(Post $post){
        return view('admin.post.edit',compact('post'));
    }

    public function update(post $post,PostUpdateRequest $request){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.index')->with('success', 'post details has been updated successfully!');
    }

    public function cancel(Post $user){
        return view('admin.post.cancel',compact('post'));
    }

    public function delete(post $post){
        return view('admin.post.delete',compact('post'));
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index')->with('success', 'post  details has been deleted successfuly!');
    }

    public function comment(post $post){
        return view('admin.post.comment',compact('post'));
    }
}