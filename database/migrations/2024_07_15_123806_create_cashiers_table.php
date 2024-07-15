<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashiersTable extends Migration
{
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_exchanges')->default(0); // Количество обменов
            $table->decimal('total_amount', 15, 2)->default(0.00); // Сумма обменов
            $table->foreignId('exchanger_id')->constrained()->onDelete('cascade'); // Внешний ключ для связи с таблицей exchangers
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashiers');
    }
}
