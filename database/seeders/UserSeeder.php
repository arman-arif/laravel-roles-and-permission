<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'      => 'Arman Arif',
                'username'  => 'arman',
                'email'     => 'dev@armanarif.com',
                'password'  => bcrypt('arman123'), // arman123
            ],
            [
                'name'      => 'Ahmed Emon',
                'username'  => 'emon',
                'email'     => 'mail@ahmedemon.com',
                'password'  => bcrypt('ahmedemon'), // ahmedemon
            ],
        ]);
    }
}
