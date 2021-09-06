@extends('layouts.admin.master')
@section('title','Post.list show')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                <button type="button" class="#"><a href="{{ route('post.index',$post->id )}}"><i class="fas fa-arrow-left"></i></a></button>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <th><h3>{{$post->heading}}</h3></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b> content : </b>{{ $post->content}}</td>
                        </tr>
                        <tr>
                            <td><b> created by : </b>{{ $post->user->firstname.$post->user->lastname}}</td>
                        </tr>
                        <tr>
                            <td><b> contact  : </b>{{$post->user->phone}}</td>
                        </tr>
                        <tr>
                            <td><b> email  : </b>{{$post->user->email}}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection