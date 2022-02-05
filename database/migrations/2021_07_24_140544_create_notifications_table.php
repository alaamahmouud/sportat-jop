<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('content');
			$table->enum('action', array('voted', 'unvoted', 'comment'));
			$table->integer('notifiable_id');
			$table->string('notifiable_type');
            $table->string('model_type');
            $table->integer('model_id');

		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}
