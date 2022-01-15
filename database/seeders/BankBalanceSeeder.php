<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_balances')->insert([
            'user_id' => 1,
            'amount' => 1000
        ]);

        DB::table('bank_balances')->insert([
            'user_id' => 2,
            'amount' => 12000
        ]);

        DB::table('bank_balances')->insert([
            'user_id' => 3,
            'amount' => 535.50
        ]);
    }
}
