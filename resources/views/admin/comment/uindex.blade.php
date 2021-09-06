@extends('layouts.admin.master')
@section('title','User List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h2>Users</h2>
                </div>
            </div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif  

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            
                            <th>Comments</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($users as $user)  
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                            @foreach ($user->postcomments as $user1)
                            <a href="{{route('comment.aindex',$user->id)}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-right"></i></a>
                            @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="pt-2">
                    <div class="float-right">
                        {{$users->links() }}  
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection
