<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Andri Panca',
                'email' => 'andripanca@gmail.com',
                'password' => Hash::make('andripanca'),
            ]
        ];

        User::insert($data);
    }
}
