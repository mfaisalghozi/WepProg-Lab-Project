<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'user_id' => 1,
            'pizza_id' => 1,
            'quantity' => 6,
            'total_price' => 1999888,
            'transaction_date' => Carbon::now(),
        ]);
        DB::table('transactions')->insert([
            'user_id' => 2,
            'pizza_id' => 2,
            'quantity' => 3,
            'total_price' => 800012,
            'transaction_date' => Carbon::now(),
        ]);
        DB::table('transactions')->insert([
            'user_id' => 3,
            'pizza_id' => 3,
            'quantity' => 10,
            'total_price' => 121222,
            'transaction_date' => Carbon::now(),
        ]);
    }
}
