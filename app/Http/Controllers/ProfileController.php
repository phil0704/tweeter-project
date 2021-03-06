<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use App\Comment;
use App\Profile;
use App\Follower;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( $user = Auth::user() ) {
          $user = Auth::user();
          return view('profile.index', compact('user'));
          }
          // Redirect by default.
          return redirect('/tweets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
    *public function create()
    *{
    *    //
    *}
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
    *public function store(Request $request)
    *{
    *    //
    *}
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($user = Auth::user()) {
            $user = User::findOrFail($id);

            return view('profile.edit', compact('user'));
        }

        return redirect('/tweets');
    }

    public function followProfile($id)
    {
      $follow = new Follower;
      $follow->profile = profile()->id;
      $follow->follower_id = $id;
      $follow->followed = 1;
      $follow->save();

      return redirect()->back();
    }

    public function UnfollowProfile($id)
    {
      $follow = Follower::where('profile_id', profile()->id)
                        ->where('follower_id', $id)
                        ->delete();

      return redirect()->back();
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
                'name' => 'required'
            ));

            User::whereId($id)->update($validatedData);

            return redirect('/profile')->with('success', 'Profile updated.');
        }
        // Redirect by default.
        return redirect('/tweets');
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('usersView', compact('user'));
    }
}
