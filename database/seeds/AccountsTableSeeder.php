<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('accounts')->truncate();
        \DB::table('accounts')->insert([
            [
                'account_number' => 1,
                'name' => 'Aset',
                'normal_balance' => 'D',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_number' => 2,
                'name' => 'Kewajiban',
                'normal_balance' => 'K',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_number' => 3,
                'name' => 'Ekuitas',
                'normal_balance' => 'K',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_number' => 4,
                'name' => 'Pendapatan',
                'normal_balance' => 'K',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_number' => 5,
                'name' => 'Biaya',
                'normal_balance' => 'D',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
