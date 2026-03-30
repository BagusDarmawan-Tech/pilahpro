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
        Schema::create('sale_product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_purchase_order');
            $table->unsignedBigInteger('id_type_product');
            $table->unsignedBigInteger('id_sale_product');
            $table->decimal('weight_product', 9, 2);
            $table->decimal('price_product', 10, 2);
            $table->decimal('total_price_product', 12, 2);
            $table->unsignedTinyInteger('total_bag_sale_product')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_purchase_order')->references('id')->on('purchase_orders');
            $table->foreign('id_type_product')->references('id')->on('type_products');
            $table->foreign('id_sale_product')->references('id')->on('sale_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_product_details');
    }
};
