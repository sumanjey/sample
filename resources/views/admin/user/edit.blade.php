@extends('layouts.admin.master')
@section('title','dash')
@section('sidebar')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            @if(Auth::user()->role->name == "Admin" && $user->id != Auth::user()->id)
                <div class="float-left">
                    <h4 class="card-title">Edit User - {{ $user->firstname.' '.$user->lastname }}</h4>
                </div>
                @else
                <h2 class="float-left ml-2">Edit Your Profile</h2>  
                @endif
            </div>
            <div class="card-body">
          {!! Form::open()->fill($user)->route('user.update',[$user->id])->method('patch') !!}
                @include('admin.user._form')
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-left">
                            <button class="btn btn-dark btn-md"><i class="mdi mdi-cancel"></i> cancel </button>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-success btn-md "><i class="fa fa-cloud-upload"></i> update </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

