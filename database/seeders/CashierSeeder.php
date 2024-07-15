<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cashier;

class CashierSeeder extends Seeder
{
    public function run()
    {
        Cashier::create(['name' => 'Иван Васильевич']);
        Cashier::create(['name' => 'Марфа Степановна']);
    }
}
