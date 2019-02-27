<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('street_address')->default('');
            $table->string('city')->default('');
            $table->string('state')->default('OR');
            $table->string('zip')->default('');
            $table->integer('price')->default(0);
            $table->integer('beds')->default(0);
            $table->integer('baths')->default(0);
            $table->integer('half_baths')->default(0);
            $table->integer('sqft')->default(0);
            $table->string('community')->default('');
            $table->string('neighborhood')->default('');
            $table->text('description')->default('');
            $table->text('txt_code')->nullable();
            $table->text('status')->default('Coming Soon');
            $table->boolean('is_live')->default(0);
            // $table->string('slug')->default('');
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
        Schema::dropIfExists('listings');
    }
}
