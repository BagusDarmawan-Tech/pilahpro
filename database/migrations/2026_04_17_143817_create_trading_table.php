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
        Schema::create('trading', function (Blueprint $table) {
            $table->id();
            $table->date('trading_date');
            $table->string('name_trading', 100);
            $table->unsignedBigInteger('id_contact_buyer');
            $table->decimal('grand_total', 12, 2)->nullable();
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
        Schema::dropIfExists('trading');
    }
};
