@extends('layouts.admin.master')
@section('title','Post.list')
@section('content')

<div class="row">
    <div class="col-12 text-dark">
        <div class="card shadow p-3 mb-5 bg-white rounded border-primary">
            <div class="card-header rounded border-primary">
                <div class="float-left">
                    <h2>Posts</h2>
                </div>

                <div class="float-right">
                    <a class="btn btn-info btn-icon-split-md" href="{{ route('post.create')}}"><i class="fas fa-plus-circle">Create post</i></a>
                </div>
            </div>
        
            <div class="card-body">
                @if (session('success'))
            <div class="alert alert-warning">
                {{ session('success') }}
            </div>
            @endif  

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</id>
                        <th>Title</th>
                        <th>created_by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->heading}}</td>
                    <td>{{$post->user->email}}</td>
                    <td>
                        <a href="{{ route('post.show',$post->id)}}" class="btn btn-info btn-icon-split"><span class="text">Show</span></a>
                        @if(Auth::user()->role->name != 'Admin')
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$post->id}}">Comments</button>
    
                            <div class="modal fade" id="exampleModal-{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Messages</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>  </button>
                                        </div>
                                        {!! Form::open()->route('comment.store',[$post->id])->method('post') !!}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {!! Form::text('q','Your Comment',request()->input('q')) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">publish</button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('post.edit',$post->id)}}" class="btn btn-info btn-icon-split"><span class="text">Edit</span></a>
                        <a href="{{ route('post.delete',$post->id)}}" class="btn btn-info btn-icon-split"><span class="text">Delete</span></a>
                    </td>                   
                </tr>
            @endforeach
            </tbody>
            </table>

            <div class="pt-2">
                <div class="float-right">
                 {{ $posts->links() }}
                 </div>
            </div>
        </div>
    </div>
</div>



@endsection
