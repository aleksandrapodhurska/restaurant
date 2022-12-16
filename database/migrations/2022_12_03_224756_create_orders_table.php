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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->unsignedBigInteger('menu_item_id')->nullable();
            $table->tinyInteger('quantity')->default(1);
            $table->decimal('price')->default(0.00);
            $table->decimal('total')->default(0.00);
            $table->string('discount')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            // Foreign keys
            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->foreign('bill_id')->references('id')->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
