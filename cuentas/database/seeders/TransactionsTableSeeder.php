<?php

namespace Database\Seeders;

// Puebla la tabla 'transactions' con un solo registro.
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'user_id' => 1,  
            'account_id' => 1, 
            'category_id' => 1, 
            'amount' => -150.00,
            'type' => 'expense',
            'description' => 'Supermercado',
        ]);
    }
}