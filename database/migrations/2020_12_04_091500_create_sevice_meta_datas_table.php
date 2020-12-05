<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeviceMetaDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_meta_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('value');
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('service_meta_id')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('service_meta_id')->references('id')->on('service_metas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_meta_datas');
    }
}
