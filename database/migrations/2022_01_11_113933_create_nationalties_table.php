<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationaltiesTable extends Migration {

	public function up()
	{
		Schema::create('nationalties', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->boolean('is_active')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('nationalties');
	}
}