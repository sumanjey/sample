@extends('layouts.admin.master')
@section('title','Post.list show')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    @if(Auth::user()->role->name == "Admin" && $user->id != Auth::user()->id)
                    <a href="{{route('user.index')}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-left"></i></a>
                    <h2 class="float-left ml-2">User Details</h2>
                    @else
                    <h2 class="float-left ml-2">Your Details</h2>
                    @endif
                </div>
                @if(Auth::user()->role->name != "Admin")
                <div class="float-right">
                <button type="button" class="btn btn-info btn-icon-split"><a href="{{ route('user.edit',$user->id)}}"><i class="fas fa-edit">Edit Profile</i></a></button>
                </div>
                @endif
            </div>

            <div class="card-body">
                
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{$user->firstname}}</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <tr><td>FirstName :{{$user->firstname}}</td></tr>
                        <tr><td>LastName :{{$user->lastname}}</td></tr>
                        <tr><td>Email :{{ $user->email }}</td></tr>
                        <tr><td>Department :{{ $user->department }}</td></tr>
                        <tr><td>Role :{{ $user->role->name }}</td></tr>
                        <tr><td>Password :{{ $user->password }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        


            
@endsection