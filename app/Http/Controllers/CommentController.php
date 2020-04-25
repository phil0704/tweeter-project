<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Tweet;
use App\Comment;
use App\Profile;
use Auth;


class CommentController extends Model
{
  //
  public function index()
  {

  }
  public function create()
  {
    $user = Auth::user();
    if ($user)
    return view('comments.create');
    else 
    return redirect('/posts');
  }
  public function store(Request $request)
  {
    if ($user = Auth::user())
    {
      $validateData = $request->validate(array('message' => 'required|max:250',
    ));
    $tweet = $request->all();
    $tweet['user_id'] = auth()->user()->id;
    if ( isset($request['is_gif']) && ($request['is-gif'] ==='true')) {
      $tweet['is_gif'] = 1;
    }
     Comment::create($tweet);
     return redirect('/posts')->with('success', 'Comment saved.');
    }
    return redirect('/posts');
  }

   protected $fillable = array(
     'body',
   );

   public function user()
   {
      return $this->belongsTo('App\User');
   }

   public function replies()
   {
      return $this->hasMany('App\Comment', 'parent_id');
   }

   public function likes()
   {
     return $this->hasMany('App\like');
   }
}
