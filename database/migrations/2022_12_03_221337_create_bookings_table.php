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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('adults')->nullable();
            $table->tinyInteger('children')->nullable();
            $table->tinyInteger('infants')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->boolean('show')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('status')->references('id')->on('booking_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
