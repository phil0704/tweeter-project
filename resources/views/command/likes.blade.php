<form action="{{route('tweet.like', $tweet->id)}}" method="get">
    <input type="submit" value="Like" class="btn btn-warning">
</form>