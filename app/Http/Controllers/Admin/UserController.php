<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
        $this->authorize('index',new User);
        $q = request()->input('q');
        if($q){
            $users =User::where('firstname','like',"%{$q}%")->orwhere('lastname','like',"%{$q}%")->orwhere('id','like',"%{$q}")->with('role')->orderBy('id', 'desc')->paginate(12);
        }else{
            $users = User::with('role')->orderBy('id', 'desc')->paginate(12);
        }
        
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        $roles1 = Role::where('id','<=',5)->pluck('name','id')->toArray();
        $roles1['']='---------------Choose Your Role----';
        $roles2 = Role::where('id','>',5)->pluck('name','id')->toArray();
        $roles2['']='---------------Choose Your Role----';
        return view('admin.user.create',compact('roles1','roles2'));
    }

    public function store(UserStoreRequest $request){
        $data = $request->validated();
        
        if($data['role_id1']!=null){
            $role_id=$data['role_id1'];
        }else{
            $role_id=$data['role_id2'];
        }
        

        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'role_id' =>$role_id,
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('user.index')->with('success', 'User  details has been created successfuly!');
    }

    public function show(User $user){
        $user->load('role');
        return view('admin.user.show',compact('user'));
    }

    public function edit(User $user){
        $roles1 = Role::where('id','<=',5)->pluck('name','id')->toArray();
        $roles1[''] = '--------------Choose Your Role----------------';
        $roles2 = Role::where('id','>',5)->pluck('name','id')->toArray();
        $roles2[''] = '--------------Choose Your Role----------------';
        return view('admin.user.edit',compact('roles1','roles2','user'));
       
    }

    public function update(User $user,UserUpdateRequest $request){
        $data=$request->validated();
        if($request->input('password')){
            $data['password'] = Hash::make($request->input('password'));
        }else{$data['password'] = $user->password;}
        if(Auth::user()->role->name == "Admin"){

        if($data['department'] == 'blog' ){
            $role_id = $data['role_id2'];
            unset($data['role_id1']);
            unset($data['role_id2']);
            $data['role_id'] = $role_id;
        }else{
            $role_id = $data['role_id1'];
            unset($data['role_id1']);
            unset($data['role_id2']);
            $data['role_id'] = $role_id;
        }

        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User  details has been updated successfuly!');
    }else{
        $data['department'] = $user->department;
        $data['email'] = $user->email;
        $data['role_id'] = $user->role_id;
        
        $user->update($data);
        return redirect()->route('dashboard')->with('success', 'Your profile updated');
        }
    }

     public function cancel(User $user){
            return view('admin.user.cancel',compact('user'));
     }  
    

    public function delete(User $user){
        return view('admin.user.delete',compact('user'));
    }

    public function destroy(User $user){
        if($user->role_id ==1){
        $count = User::where('role_id',1)->count();
        if($count > 2){
             $user->delete();
        return redirect()->route('user.index')->with('success', 'User details has been deleted successfully!');
    }
    else{
      return redirect()->back()->with('error', 'you cannot delete these account');
        }
    }else{
        $user->delete();
        return redirect()->route('user.index')->with('success','user details has been deleted successfully');
        }   
    }
}
