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
        Schema::create('strain_effects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('strain_id')->unsigned();
            $table->unsignedBigInteger('effect_id')->unsigned();

            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade');
            $table->foreign('effect_id')->references('id')->on('effects')->onDelete('cascade');

            $table->float('score')->default(0);
            $table->integer('order')->default(0);
            $table->integer('votes')->default(0);

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
        Schema::dropIfExists('strain_effects');
    }
};
