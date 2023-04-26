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
        Schema::create('strain_cannabinoids', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('strain_id');
            $table->foreign('strain_id')->references('id')->on('strains')->onDelete('cascade');

            $table->unsignedBigInteger('cannabinoid_id');
            $table->foreign('cannabinoid_id')->references('id')->on('cannabinoids')->onDelete('cascade');

            $table->float('value')->default(0);
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
        Schema::dropIfExists('strain_cannabinoids');
    }
};
