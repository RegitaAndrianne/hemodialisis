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
        	'name'=>'Adminnya',
        	'role'=>'admin',
        	'email'=>'admin123@gmail.com',
        	'password'=>bcrypt('admin123')
        ]);

        // DB::table('users')->insert([
        //     'name'=>'regita',
        //     'role'=>'medis',
        //     'email'=>'gitaandria95@gmail.com',
        //     'password'=>bcrypt('gita123')
        // ]);

        // DB::table('users')->insert([
        //     'name'=>'fiko',
        //     'role'=>'patient',
        //     'email'=>'fiko123@gmail.com',
        //     'password'=>bcrypt('fiko123')
        // ]);
    }
}
