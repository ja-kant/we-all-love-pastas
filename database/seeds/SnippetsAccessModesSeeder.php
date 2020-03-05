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
                ['title' => 'Публичный',],
                ['title' => 'Только по ссылке',]
            ]
        );
    }

}
