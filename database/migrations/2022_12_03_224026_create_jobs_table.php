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
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->unsignedBigInteger('menu_item_id')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->timestamps();
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('ready_at')->nullable();
            $table->dateTime('served_at')->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
