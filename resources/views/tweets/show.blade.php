@extends('layout')

@section('title')
Show Tweet
@endsection
@section('content')
<h2>{{ $tweetUser->name }}</h2>
<p>
    {{ $tweet->message }}
</p>

@include('partials.errors')

<h3><a href="{{route('profile.show', $tweet->user->id)}}">{{$tweetUser->name}}</a></h3>
<p>
  {{$tweet->message}}
</p>
<h4>Display Comments</h4>
@include('partials.comment_replies', ['comments' => $tweet->comments, '$tweet_id' => $tweet->id])
<h4>Add comment</h4>

      <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
          <input type="text" name="comment_body" class="form-control" />
          <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-warning" value="Add Comment" />
        </div>
      </form>

@endsection
