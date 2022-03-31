<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disasters', function (Blueprint $table) {
			$table->increments('id');
            $table->string('hero_image')->nullable();
			$table->string('disaster_type');
			$table->string('content', 65535);
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
        Schema::drop('disasters');
    }
}
