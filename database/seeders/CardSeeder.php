<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Card;

class CardSeeder extends Seeder
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
                'user_id' => 1,
                'number' => '1234 1234 1234 1234',
                'holder' => 'Andri Panca Purnama',
                'expiry_date' => '2023-08-29',
                'security_code' => Hash::make('1234'),
                'type' => 'credit_card'
            ]
        ];

        Card::insert($data);
    }
}
