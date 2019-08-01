<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => str_random(10),
            'category_id' => 1,
            'description' => str_random(200),
            'user_id' => 1,
            'image' => str_random(10).'jpg',
        ]);
    }
}
