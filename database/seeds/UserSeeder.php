<?php

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
        if(env('APP_ENV') != 'production')
        {
            $password = Hash::make('jigs');

            $user[] = [
                'email' => 'juneljigjimenez@gmail.com',
                'name' =>'Junel Jig G. Jimenez',
                'password' => $password,'created_at'=>'2019-12-12 08:31:11','updated_at'=>'2019-12-12 08:31:11'
            ];

            App\User::insert($user);
        }
    }
}
