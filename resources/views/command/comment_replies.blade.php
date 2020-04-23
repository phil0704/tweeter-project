@foreach($comments as $comment)

   <div class="display-comment">
       <strong><a href="{{route('profile.show', $comment->user->id)}}">{{ $comment->user->name }}</a></strong>
       <p>{{ $comment->body }}</p>
       <a href="" id="reply"></a>
       <form method="post" action="{{ route('reply.add') }}">
           @csrf
           <div class="form-group">
               <input type="text" name="comment_body" class="form-control" />
               <input type="hidden" name="tweet_id" value="{{ tweet_id }}" />
               <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
           </div>
           <div class="form-group">
               <input type="submit" class="btn btn-warning" value="Reply" />
           </div>
       </form>
       <ul>
         @auth
         <li>
             <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-primary">
               Edit Comment
             </a>
         </li>
         <li>
             <form action="{{route('comments.destroy', $comment->id)}}" method="post">
               @csrf
                 @method('DELETE')
                 <input type="submit" value="Delete Comment">
             </form>
         </li>
         @endauth
       </ul>
       @include('command.comment_replies', ['comments' => $comment->replies])
   </div>
@endforeach
