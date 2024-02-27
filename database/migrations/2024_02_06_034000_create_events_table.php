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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date');
            $table->text('description');
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('artist_id')->index();
            $table->unsignedBigInteger('places_id')->index();
            $table->decimal('price_tickets', 8, 2);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('places_id')->references('id')->on('places');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
