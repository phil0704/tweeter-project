<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tweet;
use App\User;
use App\Comment;
use Auth;

class CommentController extends Controller
{

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    /*
      //
      $comment = Comment::findOrFail($id);
      $commentUser = $comment->user()->get()[0];
      return view( 'comments.show', compact('comment'), compact('commentUser') );
      */
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $tweet = tweet::find($request->get('tweet_id'));
        $tweet->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
        {
            $reply = new Comment;
            $reply->body = $request->get('comment_body');
            $reply->user()->associate($request->user());
            $reply->parent_id = $request->get('comment_id');
            $tweet = tweet::find($request->get('oink_id'));

            $tweet->comments()->save($reply);

            return back();

        }
        public function edit($id)
        {
            //
            if ($user = Auth::user()) {
                $comment = Comment::findOrFail($id);

                return view('comments.edit', compact('comment'));
            }

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
            //
            if ( $user = Auth::user() ) {
                $validatedData = $request->validate(array(
                    'body'
                ));

                Comment::whereId($id)->update($validatedData);

                return redirect('/tweets')->with('success', 'Comment updated.');
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
            //
            if ($user = Auth::user()) {
            $comment = Comment::findOrFail($id);

            $comment->delete();

            return back()->with('success', 'Comment deleted.');
          }
            return redirect('/tweets');
        }
}
