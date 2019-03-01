<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Blog System',
            'email' => 'kamranhussain0005@gmail.com',
            'about' => 'We are awesome!',
            'address' => 'We live in the whole world.'
        
        ]);
    }
}
