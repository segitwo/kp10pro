<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfferVariantFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_variant_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variant_id')->unsigned();
            $table->text('name');
            $table->integer('index');
            $table->timestamps();

            $table->foreign('variant_id')->references('id')->on('offer_variants')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_variant_fields');
    }
}
