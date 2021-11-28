@extends('layout.master')

@section('content')
<h1>Edit Post</h1>
<br>
@if(session()->has('success'))
<div>
    {{session()->get('success')}}
</div>
@endif
<br>
<form action="{{ url('/update') }}" method="get">
    @csrf 
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <p>Title</p>    
    <input type="text" name="name" value="{{ $post->name }}"> <br>
    @if($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <p>Description</p>
    <textarea name="description" id="" cols="30" rows="10">
        {{$post->description}}
    </textarea><br><br>
    @if($errors->has('description'))
        {{ $errors->first('description') }}
    @endif
    <!-- <input type="checkbox" name="checkbox" {{--$post->is_active == "1" ? "checked" : ""--}}> -->

    <input type="submit" value="Update Post">
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