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
        Schema::create('strains', function (Blueprint $table) {
            $table->id();

            $table->string('genetic_image')->nullable();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->enum('phenotype', ['hybrid', 'indica', 'sativa', 'ruderalis'])->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();

            $table->integer('cannabinoid_id')->nullable();
            $table->integer('phenotype_id')->nullable();
            $table->integer('terpene_id')->nullable();
            $table->integer('effect_id')->nullable();

            $table->integer('reviews')->default(0);
            $table->float('rating')->default(0);
            $table->float('source_rating')->default(0);
            $table->boolean('active')->default(true);
            $table->integer('meta_id')->nullable();

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
        Schema::dropIfExists('strains');
    }
};
