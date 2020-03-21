<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\User;
use Faker\Factory;

class TeamsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Factory::create();
       $users = User::all();
       $numberOfUsers = count( $users );
       foreach ( $users as $user ) {
         Team::create( ['team_name' => $faker->word] )
             ->users() // Attaching random user(s).
             ->attach( rand( 1, $numberOfUsers ) );
     }
    }
}
