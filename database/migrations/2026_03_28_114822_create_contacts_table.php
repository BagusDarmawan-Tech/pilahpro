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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name_contact', 100);
            $table->string('number_contact', 100);
            $table->text('addres_contact')->nullable();
            $table->string('number_account_contact', 100)->nullable();
            $table->unsignedBigInteger('id_securitas');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_securitas')->references('id')->on('securitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
