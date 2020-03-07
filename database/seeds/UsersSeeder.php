<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\User::class, 30)->create()->each(function ($user) {
            $user->snippets()->saveMany(factory(App\Snippet::class, 50)->make());
        });
    }

}
