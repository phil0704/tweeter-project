<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        ( new UsersTable() )->run();
        ( new TeamsTable() )->run();
        ( new TweetsTableSeeder() )->run();
    }
}
