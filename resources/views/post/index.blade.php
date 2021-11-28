@extends('layout.master')

@section('title')
Posts 
@endsection

@section('content')
<h1> Posts </h1>
<hr> <br>

<!-- if post delete -->
@if(session()->has('success'))
    {{session()->get('success')}}
@endif

@foreach($posts as $post)
<div>    
    <h3> {{$post->name}} </h3>
    <p> {{$post->description}} </p>
    <a href="{{url('/get/'.$post->id)}}">Edit </a> 
    <a href="{{url('/delete/'.$post->id)}}">Delete</a> <br>
</div>
<br>
@endforeach

@endsection 