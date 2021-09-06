@extends('layouts.admin.master')
@section('title','Post.list')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
            
                    <h2>create post</h2>
                </div>
            </div>
                  <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-warning">
                        {{ session('success') }}
                        </div>
                    @endif
                    {!! Form::open()->route('post.store')->method('post') !!}
                    @include('admin.post._form')
                        <div class-"row">
                            <div class="col-12">
                                <div class="float-right">
                                    <button class="btn btn-success btn-md"><i class="mdi mdi-floppy"></i>Create</button>
                                </div>

                                <div class="float-left">
                                    <a class="btn btn-dark btn-md" href="{{ route('post.index') }}"><i class="mdi mdi-cancel"></i>cancel</a>
                                </div>
                            </div>
                        </div>
                    {!! form::close() !!}
                    </div>
        </div>
    </div>
</div>
@endsection







