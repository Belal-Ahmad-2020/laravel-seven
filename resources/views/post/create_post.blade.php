@extends('layout.master')

@section('content')
<h1>Create New Post</h1>
<br>
@if(session()->has('success'))
<div>
    {{session()->get('success')}}
</div>
@endif
<br>
<form action="{{ url('/create') }}" method="get">
    @csrf 
    <p>Title</p>
    <input type="text" name="name"> <br>
    <p>Description</p>
    <textarea name="description" id="" cols="30" rows="10">
    </textarea><br><br>
    <!-- <span>Is Active</span>
    <input type="checkbox" name="" >   -->


    <input type="submit" value="Create Post">
    <br><br>
</form>

<!-- to show the errors  -->
<!-- when we have error -->
@if(!$errors->isEmpty()) 
    <div>
        <ul>
            @foreach($errors->all() as $error) 
                <li> {{$error}}  </li>   
            @endforeach
        </ul>
    </div>
@endif



@endsection 