<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['withdrawal', 'deposit']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('currency_id');
            $table->double('amount');
            $table->enum('status', ['confirm', 'reject'])->default('confirm');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
