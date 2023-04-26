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
        Schema::create('strain_terpenes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('strain_id')->unsigned();
            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade');

            $table->bigInteger('terpene_id')->unsigned();
            $table->foreign('terpene_id')->references('id')->on('terpenes')->onDelete('cascade');


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
        Schema::dropIfExists('strain_terpenes');
    }
};
