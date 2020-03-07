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
         $this->call(SnippetsAccessModesSeeder::class);
         $this->call(SnippetsLifetimesSeeder::class);
         $this->call(UsersSeeder::class);
    }
}
