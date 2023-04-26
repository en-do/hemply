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
        Schema::create('cannabinoids', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('cannabinoids');
    }
};
