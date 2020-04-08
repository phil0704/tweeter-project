<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use App\Profile;
use App\Comment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users()
   {
       $users = User::get();
       return view('users', compact('users'));
   }

   public function user($id)
   {
       $user = User::find($id);
       return view('usersView', compact('user'));
   }

   public function follwUserRequest(Request $request){


       $user = User::find($request->user_id);
       $response = auth()->user()->toggleFollow($user);


       return response()->json(['success'=>$response]);
   }

   public function LikePost(Request $request){

      $tweet = Tweet::find($request->id);
      $response = auth()->user()->toggleLike($tweet);

      return response()->json(['success'=>$response]);
  }

  public function posts()
   {
       $tweet = Tweet::get();
       return view('tweets', compact('tweets'));
   }
}
