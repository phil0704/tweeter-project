@extends('layout')

@section('title')
Profile
@endsection

@section('content')

@include('partials.errors')
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
