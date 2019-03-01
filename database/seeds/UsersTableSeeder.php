<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Kamran Hussain',
            'email' => 'kamranhussain0005@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => 1
        
        ]);
        App\Profile::create([
            'avatar' => 'uploads/kamran.jpg',
            'user_id' => 1,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In error quae ad, aliquam rerum sint distinctio architecto, cupiditate porro doloribus dignissimos debitis eaque inventore fugit labore quasi dolores maiores officia?
            ',
            'facebook' =>'facebook.com/kamran.mureed',
            'youtube'  => 'youtube.com'
            
        ]);
    }
}
