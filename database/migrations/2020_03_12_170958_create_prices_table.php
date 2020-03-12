<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id')->index();

            $table->integer('quality_id')->index();

            $table->integer('store_id')->index();
            $table->integer('price_variation_id')->index();

            $table->dateTime('registered_at');
            $table->integer('price')->nullable();

            $table->json('details'); //relative gold price, relative $ price, etc

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
        Schema::dropIfExists('prices');
    }
}
