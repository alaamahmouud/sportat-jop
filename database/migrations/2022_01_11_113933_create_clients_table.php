<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email', 255);
			$table->string('phone');
			$table->string('relative_phone', 255)->nullable();
			$table->datetime('d_o_b')->nullable();
			$table->string('password');
			$table->string('provider_user_id')->nullable();
			$table->enum('provider', array('google', 'facebook', 'twitter'))->nullable();
			$table->string('pin_code')->nullable();
			$table->datetime('pin_code_date_expired')->nullable();
			$table->string('first_name', 255)->nullable();
			$table->string('last_name', 255)->nullable();
			$table->enum('gender', array('male', 'female'))->nullable();
			$table->integer('nationalty_id')->nullable();
			$table->integer('country_id')->nullable();
			$table->enum('type_identifier', array('identifier', 'passport'))->nullable();
			$table->date('expiration_date')->nullable();
			$table->string('number_identifier')->nullable();
			$table->longText('bio')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
