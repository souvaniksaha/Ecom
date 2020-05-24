<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
              
            [   'id' => 1,
                'name' => 'souvanik saha',
                'email'=>'souvanik.saha@gmail.com',
                'mobile'=>'8016654604',
                'type' => 'admin',
                'password' =>'$2y$10$1beUEsEs/Mf2nAlpYtkA8eaEivGjsgztUUFUtprXmQLvb/iYIWgA2',
                'image' => '',
                'status' => 1
            ],
            [   'id' => 2,
                'name' => 'Nilanga Debnath',
                'email'=>'nilanga.debnath@gmail.com',
                'mobile'=>'8524569630',
                'type' => 'admin',
                'password' =>'$2y$10$1beUEsEs/Mf2nAlpYtkA8eaEivGjsgztUUFUtprXmQLvb/iYIWgA2',
                'image' => '',
                'status' => 1
            ],
            [   'id' => 3,
                'name' => 'Harvey Spector',
                'email'=>'harveys190@gmail.com',
                'mobile'=>'8528521950',
                'type' => 'subadmin',
                'password' =>'$2y$10$1beUEsEs/Mf2nAlpYtkA8eaEivGjsgztUUFUtprXmQLvb/iYIWgA2',
                'image' => '',
                'status' => 1
            ],
            [   'id' => 4,
                'name' => 'Louis Litt',
                'email'=>'louis.litt@gmail.com',
                'mobile'=>'8574123695',
                'type' => 'subadmin',
                'password' =>'$2y$10$1beUEsEs/Mf2nAlpYtkA8eaEivGjsgztUUFUtprXmQLvb/iYIWgA2',
                'image' => '',
                'status' => 1
            ],

        ];

        DB::table('admins')->insert($adminRecords);
    }
}
