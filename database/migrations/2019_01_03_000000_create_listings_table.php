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
            $table->integer('city_id')->unsigned();
            //$table->integer('user_id')->unsigned();

            $table->string('street_address')->default('');
            $table->string('state')->default('OR');
            $table->string('zip')->default('');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('beds')->nullable();
            $table->unsignedInteger('baths')->nullable();
            $table->unsignedInteger('half_baths')->nullable();
            $table->unsignedInteger('sqft')->nullable();
            $table->string('community')->nullable();
            $table->string('neighborhood')->nullable();
            $table->text('description')->nullable();
            $table->string('txt_code')->nullable();
            $table->string('status')->default('Coming Soon');
            $table->boolean('is_live')->default(0);
            // $table->string('slug')->default('');
            $table->timestamps();

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');

            // $table->foreign('user_id')
            //         ->references('id')
            //         ->on('users')
            //         ->onDelete('cascade');
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
