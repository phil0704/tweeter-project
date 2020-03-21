<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /**
     * We can seed specific data directly!
     * This /can/ be good for testing, but can
     * be cumbersome.
     * Great for default configurations if you
     * have an application "options" or "settings"
     * table!
     */

    // First Tweet.
    // DB::table( 'tweets' )->insert( array(
    //     'author' => 'Bob',
    //     'message' => 'My first Tweet!'
    // ) );
    // // Second Tweet.
    // DB::table( 'tweets' )->insert( array(
    //     'author' => 'Sarah',
    //     'message' => 'Hello, world!'
    // ) );
    // // Third Tweet.
    // DB::table( 'tweets' )->insert( array(
    //     'author' => 'Sam',
    //     'message' => '\'Sup, yo!?'
    // ) );

    /**
     * Let's try "Faker" to prepopulate with
     * lots of imaginary data very quickly!
     * @link https://github.com/fzaninotto/Faker
     */

    // Initialize!
    $faker = Factory::create();


    // Let's make 25 Tweets in just a few lines!
    foreach( range( 1, 25 ) as $index ) {
        DB::table( 'tweets' )->insert( array(
            'user_id' => $faker->numberBetween($min = 1, $max = 5),
            'message' => $faker->catchphrase
        ) );
    }
  }
}
