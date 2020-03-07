<?php

use Illuminate\Database\Seeder;

class SyntaxHighlightersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('syntax_highlighters')->insert([
            ['name' => 'Текст', 'mode' => 'ace/mode/text'],
            ['name' => 'Javascript', 'mode' => 'ace/mode/javascript'],
            ['name' => 'PHP', 'mode' => 'ace/mode/php'],
            ['name' => 'HTML', 'mode' => 'ace/mode/html'],
            ['name' => 'Python', 'mode' => 'ace/mode/python'],
            ['name' => 'C#', 'mode' => 'ace/mode/csharp'],
            ['name' => 'MySQL', 'mode' => 'ace/mode/mysql'],
            ['name' => 'Bourne shell script', 'mode' => 'ace/mode/sh'],
            ['name' => 'CSS', 'mode' => 'ace/mode/css'],
                ]
        );
    }

}
