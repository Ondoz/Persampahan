<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'socialite_id' => NULL,
                'socialite_name' => NULL,
                'photo' => NULL,
                'name' => 'Gilang wahyudi',
                'email' => 'ondozwahyudi@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$N7swDKzpMihwuH7Wuf17peUR.UqFTmADMh.ZFGgn2ZLKQreP/ZH/e',
                'is_admin' => 1,
                'remember_token' => NULL,
                'created_at' => '2021-06-08 12:38:48',
                'updated_at' => '2021-06-08 12:38:48',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'socialite_id' => NULL,
                'socialite_name' => NULL,
                'photo' => NULL,
                'name' => 'Gading',
                'email' => 'gading@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$N7swDKzpMihwuH7Wuf17peUR.UqFTmADMh.ZFGgn2ZLKQreP/ZH/e',
                'is_admin' => 1,
                'remember_token' => NULL,
                'created_at' => '2021-06-08 12:40:32',
                'updated_at' => '2021-06-08 12:40:32',
                'status' => 1,
            ),
        ));
        
        
    }
}