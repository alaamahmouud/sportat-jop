<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 255);
			$table->longText('description')->nullable();
			$table->integer('category_id');
			$table->integer('client_id');
			$table->longText('tags')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}
