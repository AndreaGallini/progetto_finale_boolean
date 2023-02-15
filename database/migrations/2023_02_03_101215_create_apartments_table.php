<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->unique();
            $table->string('slug')->nullable();
            $table->text('cover_img');
            $table->integer('room_number');
            $table->integer('bed_number');
            $table->integer('bath_number');
            $table->integer('mq_value');
            $table->string('address');
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->string('price');
            $table->boolean('visible');
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
        Schema::dropIfExists('apartments');
    }
};