<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvacuationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evacuation_centers', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('address');
			$table->string('contact')->nullable();
			$table->string('latitude');
            $table->string('longitude');
            $table->string('description')->nullable();
            $table->string('active')->default(1);
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
        Schema::drop('evacuation_centers');
    }
}
