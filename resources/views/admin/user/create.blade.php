@extends('layouts.admin.master')
@section('title','User.list')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
            
                    <h2>create user</h2>
                </div>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
                @endif
                {!! Form::open()->route('user.store')->method('post') !!}
                @include('admin.user._form')
                <div class-"row">
                    <div class="col-12">
                        <div class="float-right">
                            <button class="btn btn-success btn-md"><i class="mdi mdi-floppy"></i>Create</button>
                            <a class="btn btn-dark btn-md" href="{{ route('user.index') }}"><i class="mdi mdi-cancel"></i>cancel</a>
                            <a class="btn btn-dark btn-md" href="{{ route('user.index') }}"><i class="mdi mdi-cancel"></i>delete</a>
                        </div>
                    </div>
                </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>



@endsection