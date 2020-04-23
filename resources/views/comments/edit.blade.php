@extends ('layout')

@section('title')
Edit Comment
@endsection
@section('content')
<p>Edit Comment:</p>
@include('command.errors')

<form method="post" action="{{route('comment.update', $comment->id)}}">
  @csrf
  @method('PATCH')
 <div class="form-group">
  <label for="body">
     <strong>Edit Comment:</strong>
     <textarea name="body" id="body" rows="10" cols="30">{{$comment->body}}</textarea>
  </label>
  </div>
<div class="form-group">
  <input type="submit" class="btn btn-warning" value="Update Comment">
</form>
</div>
@endsection
