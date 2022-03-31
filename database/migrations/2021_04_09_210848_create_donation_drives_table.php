<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_drives', function (Blueprint $table) {
			$table->increments('id');
            $table->string('image');
            $table->string('title');
            $table->string('description', 65535);
            $table->string('start_date');
            $table->string('end_date');
            $table->string('status')->default(0);
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
        Schema::drop('donation_drives');
    }
}
