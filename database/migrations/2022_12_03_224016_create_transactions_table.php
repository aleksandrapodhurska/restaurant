<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->decimal('amount')->default(0.00);
            $table->unsignedBigInteger('mode_id');
            $table->boolean('status')->default(0);
            $table->timestamps();

            // Foreign keys
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('mode_id')->references('id')->on('transaction_modes');
            
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
};
