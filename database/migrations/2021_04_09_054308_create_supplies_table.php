<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('kit_id')->unsigned();
			$table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade');
			$table->string('supply_desc');
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
        Schema::drop('supplies');
    }
}
