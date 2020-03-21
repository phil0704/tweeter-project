<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Initialize!
      $faker = Factory::create();

      // Let's make 25 users in just a few lines!
      foreach( range( 1, 25 ) as $index ) {
          $user = new User;
          $user->name = $faker->name;
          $user->email = $faker->email;
          $user->password = 'password';
          $user->age = rand( 13, 65 );
          $user->save();
      }
    }
}
