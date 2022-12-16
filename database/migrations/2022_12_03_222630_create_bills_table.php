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
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->decimal('subtotal')->default(0.00);
            $table->string('promo')->nullable();
            $table->string('discount')->nullable();
            $table->decimal('tax')->default(0.00);
            $table->decimal('total')->default(0.00);
            $table->decimal('tips')->default(0.00);
            $table->decimal('balance')->default(0.00);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('bill_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
