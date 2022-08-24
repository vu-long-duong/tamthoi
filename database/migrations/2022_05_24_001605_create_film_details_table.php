<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_details', function (Blueprint $table) {
            $table->id();
            $table->text('summary');
            $table->string('tags');
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('countrie_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('year_id');
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
        Schema::dropIfExists('film_details');
    }
}
