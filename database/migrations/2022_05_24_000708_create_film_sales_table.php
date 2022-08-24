<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_sales', function (Blueprint $table) {
            $table->id();
            $table->string('discountcode');
            $table->bigInteger('price');
            $table->Integer('exist')->random_int(1,12);//hiệu lực của mã giảm giá từ 1-12 tháng
            $table->unsignedBigInteger('userprofile_id');
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
        Schema::dropIfExists('film_sales');
    }
}
