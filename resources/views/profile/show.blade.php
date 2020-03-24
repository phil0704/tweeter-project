@extends('layout')

@section('title')
 View Profile
@endsection

@section('content')

@include('command.errors')
<h2>{{$user->name}}</h2>
  <p>
  <ul>
     <li>
        Email: {{$user->email}}
     </li>
    <li>
       username: {{$user->username}}
   </li>
 </ul>
</p>
@endsection
