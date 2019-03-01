<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::create([
            'name' => 'cricket',
            'slug' => 'cricket',
            'user_id'=>1
        ]);
    }
}
