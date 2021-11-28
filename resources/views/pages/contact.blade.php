@extends('layout.master')

@section('title')
Contact US
@endsection 


@section('content')
<h3>Contact Us Page</h3><p>usrs:</p>

@if(count($users)>0)
    <?php $id = 1; ?>
    @foreach($users as $user)    
        <li>{{$id}} . {{$user}}</li>
        <?php $id++;?>
    @endforeach
@endif

@endsection



