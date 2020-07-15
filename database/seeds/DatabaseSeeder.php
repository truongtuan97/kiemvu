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

        $data = [
            [ 'value' => '0', 'option' => '0%' ],
            [ 'value' => '0.1', 'option' => '10%' ],
            [ 'value' => '0.2', 'option' => '20%' ],
            [ 'value' => '0.3', 'option' => '30%' ],
            [ 'value' => '0.4', 'option' => '40%' ],
            [ 'value' => '0.5', 'option' => '50%' ],
            [ 'value' => '0.6', 'option' => '60%' ],
            [ 'value' => '0.7', 'option' => '70%' ],
            [ 'value' => '0.8', 'option' => '80%' ],
            [ 'value' => '0.9', 'option' => '90%' ],
            [ 'value' => '1.0', 'option' => '100%' ],
        ];
        DB::table('config_khuyenmai')->insert($data);

        $data = [
            [
                'ngay_bat_dau' => \Carbon::now(),
                'ngay_ket_thuc' => \Carbon::now(),
                'khuyenmai' => 0,                
            ]
        ];
        DB::table('promotion_configurations')->insert($data);
    }
}
