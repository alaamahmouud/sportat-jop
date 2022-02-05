<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuestsTable extends Migration {

	public function up()
	{
		Schema::create('guests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email', 255);
			$table->string('pin_code');
            $table->dateTime('pin_code_date_expired');
		});
	}

	public function down()
	{
		Schema::drop('guests');
	}
}
