@extends ('layout')

@section('title')
Edit Profile
@endsection
@section('content')
@include('partials.errors')

<form method="post" action="{{route('profile.update', $user->id)}}">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="name">
      <strong>Edit name:</strong>
      <textarea class="form-control" name="name" id="name" rows="1" cols="30">{{$user->name}}</textarea>
    </label>
    
    <label for="username">
      <strong>Edit username:</strong>
      <textarea class="form-control" name="username" id="username" rows="1" cols="30">{{$user->username}}</textarea>
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Profile">
  </div>
</form>
@endsection
