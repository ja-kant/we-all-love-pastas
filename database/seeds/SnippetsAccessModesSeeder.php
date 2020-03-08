<?php

use Illuminate\Database\Seeder;

class SnippetsAccessModesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('snippets_access_modes')->insert([
                ['title' => 'Публичный', 'auth_only' => 0],
                ['title' => 'Только по ссылке', 'auth_only' => 0],
                ['title' => 'Приватный', 'auth_only' => 1]
            ]
        );
    }

}
