@extends('layouts.admin.master')
@section('title','dash')
@section('sidebar')
<h3>Hi Welcome</h3>
@section('content')
<div class="card-body">
    @if (session('success'))
    <div class="alert alert-warning">
        {{ session('success') }}
    </div>
    @endif
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->firstname.' '.$user->lastname}}</td>
            <td>{{$user->role->name}}</td>
            @if(Auth::user()->role->name =='Admin')
            <td><button type="button" class="btn btn-icons btn-outline-primary btn-rounded btn-link"><a href="{{ route('user.edit',$user->id)}}"><i class="mdi mdi-18px mdi-chevron-double-right">Edit</i></a></button></td>
            @else
            <td></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pt-2">
    <div class="float-right">
        {{ $users->links() }}
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
