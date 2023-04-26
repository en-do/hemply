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
        Schema::create('strain_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('strain_id');
            $table->integer('user_id')->nullable();
            $table->string('helps')->nullable();
            $table->string('effects')->nullable();

            $table->string('email');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->text('comment');
            $table->boolean('active')->default(false);

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
        Schema::dropIfExists('strain_reviews');
    }
};
