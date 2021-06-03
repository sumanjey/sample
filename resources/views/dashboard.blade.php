@extends('layouts.admin.master')
@section('title','dash')
@section('header')
<h2> play with technology </h2>
@endsection
@section('content')
<button type="button" class="btn btn-outline-primary"><a href="{{ route('index')}}"><i class="class="btn btn-outline-success">Open</i></a></button>
@endsection
