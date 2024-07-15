<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exchanger;

class ExchangerSeeder extends Seeder
{
    public function run()
    {
        Exchanger::create(['name' => 'Дерибасовская 10']);
        Exchanger::create(['name' => 'Софиевская 66']);
    }
}
