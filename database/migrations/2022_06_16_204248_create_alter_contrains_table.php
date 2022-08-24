<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlterContrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verify_accounts', function (Blueprint $table) {

            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('userprofiles', function (Blueprint $table) {

            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('payments', function (Blueprint $table) {

            $table->foreign('userprofile_id')->references('id')->on('userprofiles');
        });

        Schema::table('account_users', function (Blueprint $table) {

            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('account_users', function (Blueprint $table) {

            $table->foreign('permisson_id')->references('id')->on('userpermissons');
        });

        Schema::table('posts', function (Blueprint $table) {

            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('film_details', function (Blueprint $table) {

            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('film_details', function (Blueprint $table) {

            $table->foreign('category_id')->references('id')->on('film_categories');
        });

        Schema::table('film_details', function (Blueprint $table) {
            $table->foreign('countrie_id')->references('id')->on('film_countries');
            $table->foreign('genre_id')->references('id')->on('film_genres');
            $table->foreign('year_id')->references('id')->on('film_years');
            
        });


        Schema::table('film_details', function (Blueprint $table) {

            $table->foreign('rank_id')->references('id')->on('film_ranks');
        });

        Schema::table('film_sales', function (Blueprint $table) {

            $table->foreign('userprofile_id')->references('id')->on('userprofiles');
        });



        Schema::table('evaluateds', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('comment_film_details', function (Blueprint $table) {

            $table->foreign('commentfilm_id')->references('id')->on('comment_films');
            $table->foreign('evalue_id')->references('id')->on('evaluateds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verify_accounts', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
        });

        Schema::table('userprofiles', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
        });

        Schema::table('account_users', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
        });

        Schema::table('account_users', function (Blueprint $table) {
            $table->dropForeign(['permisson_id']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['userprofiles_id']);
        });

        Schema::table('filmsales', function (Blueprint $table) {
            $table->dropForeign(['userprofiles_id']);
        });


        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
        });


        Schema::table('film_details', function (Blueprint $table) {
            $table->dropForeign(['film_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['rank_id']);
            $table->dropForeign(['countrie_id']);
            $table->dropForeign(['year_id']);
        });

        Schema::table('comment_film_details', function (Blueprint $table) {
            $table->dropForeign(['commentfilm_id']);
            $table->dropForeign(['evalue_id']);
        });

        Schema::table('evaluateds', function (Blueprint $table) {
            $table->dropForeign(['account_id']);
            $table->dropForeign(['film_id']);
        });
    }
}
