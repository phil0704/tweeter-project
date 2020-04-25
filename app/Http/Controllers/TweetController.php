<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet; // Need to pull in our model to use it!
use App\User; // Let's pull in our User model!
use App\Profile;
use App\Comment;
use App\Follower;
use App\Likes;
use Auth; // Need to pull in Auth in order to use it!

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
     //
       $tweets = Tweet::query()
                  ->join( 'users', 'tweets.user_id', '=', 'users.id' )
                  ->get();

       return view('tweets.index', compact('tweets'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if ( $user ) // Yay! You're logged in, create away!
            return view('tweets.create');
        else // Uh oh, logged out! Redirect.
            return redirect('/tweets');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Assign and check user all at once.
        if ( $user = Auth::user() ) { // Proceed and store data if the user is logged in.
            $validatedData = $request->validate(array(
                'message' => 'required|max:250'
            ));
            $tweet = new Tweet;
            $tweet->user_id = $user->id;
            $tweet->message = $validatedData['message'];
            if (isset( $request->is_gif) && ($request->is_gif === 'true')) {
              $tweet->is_gif = TRUE;
            }
            $tweet->save();

            return redirect('/tweets')->with('success', 'Tweet saved.');
    }
    // Redirect by default.
      return redirect('/tweets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tweet = Tweet::findOrFail($id);

      $tweetUser = $tweet->user()->get()[0];

      return view( 'tweets.show', compact('tweet'), compact('tweetUser') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Check if user is logged in.
      if ( $user = Auth::user() ) {
          $tweet = Tweet::findOrFail($id);
          return view( 'tweets.edit', compact('tweet') );
      }
      // Redirect by default.
      return redirect('/tweets');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Check if user is logged in.
      if ( $user = Auth::user() ) {
          $validatedData = $request->validate(array(
              'message' => 'required|max:250'
          ));
           
          Tweet::whereId($id)->update($validatedData);

          return redirect('/tweets')->with('success', 'Tweet updated.');
      }
      // Redirect by default.
      return redirect('/tweets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Check if user is logged in.
      if ( $user = Auth::user() ) {
          $tweet = Tweet::findOrFail($id);

          $tweet->delete();

          return redirect('/tweets')->with('success', 'Tweet deleted.');
      }
      // Redirect by default.
      return redirect('/tweets');
      
    }
    public function like(Post $tweet) {
      $existing_like = Like::withTrashed()->wherePostId($tweet->id)->whereUserId(Auth::id())->first();

      if (is_null($existing_like)) {
        Like::create([
          'tweet_id' => $tweet->id,
          'user_id' => Auth::id()
        ]);
      } else {
        if (is_null($existing_like->deleted_at)) {
          $existing_like->delete();
        } else {
        $existing_like->restore();
      }
    }
  }
}
