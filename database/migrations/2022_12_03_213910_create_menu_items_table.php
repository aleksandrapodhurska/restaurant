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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->integer('quantity')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->boolean('show')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            // Foreign keys
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
};
