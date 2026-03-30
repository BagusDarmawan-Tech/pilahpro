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
        Schema::create('sale_products', function (Blueprint $table) {
            $table->id();
            $table->date('date_sale_product');
            $table->unsignedBigInteger('id_contact_buyer');
            $table->decimal('grand_total', 12, 2)->nullable();
            $table->string('name_sale_product');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_contact_buyer')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_products');
    }
};
