<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->primary(['transaction_id','tea_id']);
            $table->unsignedBigInteger('transaction_id');
            $table->foreignId('tea_id');
            $table->integer('quantity');
            $table->timestamps();
        
            $table->foreign('transaction_id')->references('id')->on('transaction_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
