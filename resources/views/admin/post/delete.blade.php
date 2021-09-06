@extends('layouts.admin.master')
@section('title','post.list')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h4 class="card-title">Delete - {{$post->heading}}</h4>
                </div>    
            </div>
            <div class="card-body">
            {!! Form::open()->route('post.destroy',[$post->id])->method('delete') !!}
                <div>
                    <h4> Are sure you want to delete?</h4>
                </div>
                <a href="{{ route('post.index', $post->id) }}" class="btn btn-dark btn-md"><i class="mdi mdi-cancel"></i>Cancel</a>
                <button class="btn btn-danger btn-md float-right"><i class="mdi mdi-delete"></i> Delete </button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
