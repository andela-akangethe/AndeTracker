<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds to feed super user credentials.
     *
     * @return void
     */
    
    public function run()
    {
        $now = new DateTime();

        DB::table('users')->insert([
            'first_name' => 'Nyambura',
            'last_name'  => 'Kihoro',
            'access_level' => 1,
            'email' => 'nyambura.kihoro@andela.com',
            'password' => bcrypt('password'),
            'created_at' => $now,
        ]);
    }
}
