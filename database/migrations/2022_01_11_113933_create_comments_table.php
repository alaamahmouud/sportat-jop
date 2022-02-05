<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('content', 255);
			$table->integer('client_id');
			$table->integer('guest_id');
			$table->integer('video_id');

		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}
