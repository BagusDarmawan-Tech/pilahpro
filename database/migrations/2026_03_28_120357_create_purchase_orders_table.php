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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contact_supplier');
            $table->string('name_purchase_order', 100);
            $table->boolean('status');
            $table->date('date_purchase_order');
            $table->text('notes_purchase_order')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_contact_supplier')->references('id')->on('contacts');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
};
