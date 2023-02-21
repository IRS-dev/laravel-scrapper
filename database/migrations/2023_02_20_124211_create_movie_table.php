<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('genre');
            $table->string('duration')->nullable(); //integer
            $table->string('actor')->nullable()->default('-');
            $table->string('synopsis')->nullable()->default('-');
            $table->string('poster')->nullable()->default('-');
            $table->string('trailer')->nullable()->default('-');
            $table->string('rating')->nullable();//integer
            $table->string('review')->nullable()->default('Belum ada review');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('website_id')->nullable();
            $table->foreign('category_id')
            ->references('id')
            ->on('category')
            ->onUpdate('cascade')
            ->onDelete('set null');
             $table->foreign('website_id')
            ->references('id')
            ->on('website')
            ->onUpdate('cascade')
            ->onDelete('set null');
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
        Schema::dropIfExists('movie');
    }
}