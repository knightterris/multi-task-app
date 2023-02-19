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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('price');
            $table->string('image')->nullable();
            $table->bigInteger('category_id');
            $table->bigInteger('count');
            $table->integer('status');
            $table->string('created_by');
            $table->string('created_by_id');
            $table->string('product_type');
            $table->bigInteger('like')->default(0);
            $table->integer('wishlist_status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
