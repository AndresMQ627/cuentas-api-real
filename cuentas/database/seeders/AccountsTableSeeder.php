<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountsTableSeeder extends Seeder
{
    public function run(): void
    {
        Account::create([
            'user_id' => 1,
            'name' => 'Cuenta Principal',
            'amount' => 1000.00,
            'status' => true,
        ]);
    }
}