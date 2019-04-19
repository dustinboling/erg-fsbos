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
            $table->integer('agent_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('street_address')->default('');
            $table->string('state')->default('OR');
            $table->string('zip')->default('');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('beds')->nullable();
            $table->unsignedInteger('baths')->nullable();
            $table->unsignedInteger('sqft')->nullable();
            $table->text('description')->nullable();
            $table->string('call_code')->nullable();
            $table->string('text_code')->nullable();
            $table->string('status')->nullable();
            $table->boolean('live')->default(0);
            $table->boolean('featured')->default(0);
            // $table->string('slug')->default('');
            $table->timestamps();

            // foreign keys
            $table->foreign('agent_id')
                    ->references('id')
                    ->on('agents')
                    ->onDelete('cascade');
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities');
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
