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
        Schema::create('purchase_trips', function (Blueprint $table) {
            $table->id();
            $table->text('note_purchase_trip')->nullable();
            $table->unsignedBigInteger('id_purchase_order');
            $table->decimal('weight_gross', 9, 2);
            $table->date('date_purchase_trip');
            $table->decimal('price_per_kg', 10, 2);
            $table->decimal('total_paid', 12, 2);
            $table->unsignedTinyInteger('total_bag_purchase_product');
            $table->text('location_trip')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('purchase_trips');
    }
};
