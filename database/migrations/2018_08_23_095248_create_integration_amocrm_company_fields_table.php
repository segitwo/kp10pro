<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrationAmocrmCompanyFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integration_amocrm_company_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name', 500);
            $table->integer('field_id');
            $table->integer('company_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('integration_amocrm_companies')
                ->onDelete('cascade');
            
            $table->foreign('account_id')->references('id')->on('users')
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
        Schema::dropIfExists('integration_amocrm_company_fields');
    }
}
