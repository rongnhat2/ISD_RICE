<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('category_id');
            $table->string('item_name');
            $table->string('item_size');
            $table->string('item_discount');
            $table->string('item_resource');
            $table->string('item_trademark');
            $table->string('item_prices');
            $table->string('item_image');
            $table->string('item_amounts');
            $table->string('item_detail');
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
        Schema::dropIfExists('items');
    }
}
