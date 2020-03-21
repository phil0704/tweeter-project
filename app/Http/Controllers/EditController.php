<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
  public function show($id)
  {
      return view('user.profile', ['user' => User::findOrFail($id)]);
  }
}
