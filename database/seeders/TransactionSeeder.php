<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
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
                'card_id' => '1',
                'name' => 'DropBox',
                'amount' => 20,
                'destination_name' => 'Visa',
                'destination_number' => '1233 4566 7899 1000',
                'description' => null,
            ],
        ];

        Transaction::insert($data);
    }
}
