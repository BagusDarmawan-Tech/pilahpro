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
        Schema::create('trading_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trading');
            $table->unsignedBigInteger('id_type_product');
            $table->decimal('weight_product', 9, 2);
            $table->decimal('price_product', 10, 2);
            $table->decimal('total_price_product', 12, 2);
            $table->unsignedTinyInteger('total_bag_trading')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_trading')->references('id')->on('trading');
            $table->foreign('id_type_product')->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trading_details');
    }
};
