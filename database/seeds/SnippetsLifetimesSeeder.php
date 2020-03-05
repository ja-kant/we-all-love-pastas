<?php

use Illuminate\Database\Seeder;

class SnippetsLifetimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
         DB::table('snippets_lifetimes')->insert([
                ['seconds' => 10 * 60, 'title' => '10 мин.'],
                ['seconds' => 3600, 'title' => '1 час'],
                ['seconds' => 3 * 3600, 'title' => '3 часа'],
                ['seconds' => 24 * 3600, 'title' => '1 день'],
                ['seconds' => 7 * 24 * 3600, 'title' => '1 неделя'],
                ['seconds' => 30 * 24 * 3600, 'title' => '1 месяц'],
                ['seconds' => null, 'title' => 'Не ограничено'],
            ]
        );
    }
}
