@extends('layouts.admin.master')
@section('title','post.list')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <div class="float-left">
                    <h4 class="card-title">Edit - {{ $post->heading}}</h4>
                </div>    
            </div>
            <div class="card-body">
                {!! Form::open()->fill($post)->route('post.update',[$post->id])->method('patch') !!}
                @include('admin.post._form')
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right">
                        <button class="btn btn-success btn-md "><i class="fa fa-cloud-upload"></i> update </button>
                        </div>

                        <div class="float-left">
                        <button class="btn btn-dark btn-md"><i class="mdi mdi-cancel"></i> cancel </button>                      
                        </div>
                        
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

