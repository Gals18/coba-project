<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Adinda',
                'username'=>'adinda',
                'role'=>'operator',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Aulia',
                'username'=>'aulia',
                'role'=>'pegawai',
                'password'=>bcrypt('12345')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        } 
    }
}
