<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['name'=>'mg mg','email'=>'mgmg@gmail.com','password'=>'password','role'=>'Admin'],
            ['name'=>'ko ko','email'=>'koko@gmail.com','password'=>'password','role'=>'Postmen'],
            ['name'=>'ma ma','email'=>'mama@gmail.com','password'=>'password','role'=>'Postmen'],

        ];

        foreach($users as $user)
        User::create([
            'name'=>$user['name'],
            'email'=>$user['email'],
            'password'=>Hash::make($user['password']),
            'role'=>$user['role']
        ]);
    }
}
