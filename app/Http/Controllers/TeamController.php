<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
  //
  public function index()
  {
      $teamsAndUsers = array();

      $teams = Team::all();
      foreach ( $teams as $team )
      {
          $newSet = new \stdClass();
          $newSet->team = $team;
          $newSet->users = $team->users()->get();
          $teamsAndUsers[] = $newSet;
      }

      return view( 'teams.index', compact( 'teamsAndUsers' ) );
  }
}
