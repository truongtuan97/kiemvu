<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $data = [
            [
                'name' => 'admin',
                'phone' => '999999999',
                'email' => 'lxc150896@gmail.com',                
                'password' => Hash::make('12345'),
                'role' => 'admin'
            ],
            [
                'name' => 'admin1',
                'phone' => '999999999',
                'email' => 'lxc@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'admin'
            ],
            [
                'name' => 'admin2',
                'phone' => '999999999',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'admin'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
