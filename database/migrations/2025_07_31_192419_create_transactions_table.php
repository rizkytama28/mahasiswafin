<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('type'); // pemasukan / pengeluaran
        $table->string('category');
        $table->decimal('amount', 15, 2);
        $table->date('date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('transactions');
}
}
