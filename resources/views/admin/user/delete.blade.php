@extends('layouts.admin.master')
@section('title','user.list')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h4 class="card-title">Delete - {{$user->firstname.$user->lastname}}</h4>
                </div>    
            </div>
            <div class="card-body">
            @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
            @endif  
            {!! Form::open()->route('user.destroy',[$user->id])->method('delete') !!}
                <div>
                    <h4> Are sure you want to delete?</h4>
                </div>
            <a href="{{ route('user.index', $user->id) }}" class="btn btn-dark btn-md"><i class="mdi mdi-cancel"></i>Cancel</a>
            <button class="btn btn-danger btn-md float-right"><i class="mdi mdi-delete"></i> Delete </button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
