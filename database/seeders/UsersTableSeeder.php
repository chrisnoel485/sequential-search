<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'chris',
            'email' => 'chris@gmail.com',
            'password' => bcrypt('chris'),
            'status' => true
        ]);
    }
}
