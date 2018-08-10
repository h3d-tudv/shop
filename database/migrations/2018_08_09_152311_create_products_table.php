<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->integer('id_type');
            $table->string('description');
            $table->unsignedDecimal('unit_price', 8, 2);
            $table->unsignedDecimal('promotion_price', 8, 2);
            $table->char('image', 200);
            $table->string('unit', 200);
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_id_type_foreign');
        });
        Schema::dropIfExists('products');
    }
}
