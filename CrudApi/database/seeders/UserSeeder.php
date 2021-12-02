<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'email' => 'saeful@gmail.com',
            'username' => 'saeful',
            'password' => '123456',
            'phone'=>'085578737',
            'country'=>'indonesia',
            'city'=>'banyumas',
            'postcode'=>'53172',
            'name'=>'saeful',
            'address'=>'banyumas',
        ]);
    }
}
