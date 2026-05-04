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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name_expense', 100);
            $table->text('note_expense')->nullable()->default('text');
            $table->unsignedBigInteger('id_trading')->nullable();
            $table->unsignedBigInteger('id_sale_product')->nullable();
            $table->unsignedBigInteger('id_purchase_order')->nullable();
            $table->decimal('price_expense', 12, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_trading')->references('id')->on('trading');
            $table->foreign('id_sale_product')->references('id')->on('sale_products');
            $table->foreign('id_purchase_order')->references('id')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
