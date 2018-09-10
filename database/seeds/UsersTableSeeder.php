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
        DB::table('users')->insert([
            'name'=>'Hugo Urquiza',
            'email' => 'hugo.urquiza@gmail.com',
            'age'=>34,
            'password' => bcrypt('wsxedc32!'),
        ]);
    }
}
