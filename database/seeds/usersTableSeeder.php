<?php

use App\User;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ednaldo Marinho',
            'email' => 'edmarino@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'João das Candongas',
            'email' => 'candongas@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
