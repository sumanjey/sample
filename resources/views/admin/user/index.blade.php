@extends('layouts.admin.master')
@section('title','dash')
@section('sidebar')
@section('content')

<div class="row">
    <div class="col-12 text-dark">
        <div class="card shadow p-3 mb-5 bg-white rounded border-primary">
            <div class="card-header rounded border-primary">
                <div class="float-left">
                    <h2>Users</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-info btn-icon-split-md" href="{{ route('user.create')}}"><i class="fas fa-plus-circle"></i>Create user</a>
                </div>
            </div>
            <div class="card-body">
            @if (session('success'))
                <div class="alert alert-warning">
                    {{ session('success') }}
                </div>
            @endif
         <!--   <form>
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::text('q','',request()->input('q'))->placeholder('search user') !!} 
                    </div>
                    <div class="col-md-3">
                        <button type="Submit" class="btn btn-success btn-md">Search</button>
                    </div>
                </div>
            </form>  -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    {!! Form::text('q','',request()->input('q'))->placeholder('search user') !!} 
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                </div>
</br>
            </form>
             <table class="table" >
                    <thead class="thead-dark">
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname.' '.$user->lastname}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->posts->count() }}</td>
                            @if(Auth::user()->role->name =='Admin')
                            <td><button type="button" class="btn btn-info btn-icon-split"><a href="{{ route('user.edit',$user->id)}}"><i class="fas fa-edit">Edit</i></a></button>
                            <button type="button" class="btn btn-secondary btn-icon-split"><a href="{{ route('user.show',$user->id)}}"><i class="fas fa-tag">Show</i></a></button>
                                <button type="button" class="btn btn-danger btn-icon-split"><a href="{{ route('user.delete',$user->id)}}"><i class="fas fa-trash">Delete</i></a></button>
                            </td>
                            @else
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
