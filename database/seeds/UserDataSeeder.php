<?php

use Illuminate\Database\Seeder;
use App\User;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        $data = array();
        for ($i=0; $i < 100; $i++) { 
            $data[$i]['email'] = str_random(10) .'@gmail.com';
            $data[$i]['name'] = str_random(10);            
            $data[$i]['address'] = str_random(10);
            $data[$i]['tel'] = mt_rand(10, 12);
            $data[$i]['sex'] = 1;
            $data[$i]['birth'] = '1990-01-01';
        }

        User::insert($data);
    }
}
