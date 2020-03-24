@extends('layout')

@section('title')
Profile Index
@endsection

@section('content')

@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif

@include('command.errors')

  <h3>{{$user->name}}</h3>

    <ul>
        <li>
            <h3>{{$user->email}}</h3>
          </li>
       <li>
           <h3>{{$user->username}}</h3>
      </li>
 </ul>

  <a href="{{route('profile.edit', $user->id)}}">Edit Profile</a>


@endsection
