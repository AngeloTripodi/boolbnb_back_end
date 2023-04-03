<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = new User();
        $user->name = 'Angelo';
        $user->last_name = 'Tripodi';
        $user->date_of_birth = '1994-05-07';
        $user->password = Hash::make('123456789');
        $user->email = 'angelo@boolbnb.com';
        $user->save();

        $userTwo = new User();
        $userTwo->name = 'Tizio';
        $userTwo->last_name = 'Caio';
        $userTwo->date_of_birth = '1998-01-01';
        $userTwo->password = Hash::make('123456789');
        $userTwo->email = 'tizio@boolbnb.com';
        $userTwo->save();

        $userTwo = new User();
        $userTwo->name = 'Monica';
        $userTwo->last_name = 'De Bona';
        $userTwo->date_of_birth = '1991-09-11';
        $userTwo->password = Hash::make('12345678');
        $userTwo->email = 'm.debona@boolbnb.com';
        $userTwo->save();
    }
}
