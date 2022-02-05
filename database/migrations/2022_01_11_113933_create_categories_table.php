<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->boolean('is_active')->default(0);
		});

        \App\Models\Category::create([
            'name' => 'hamadaa' ,
            'is_active' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'hamaa' ,
            'is_active' => 1
        ]);


        \App\Models\Category::create([
            'name' => 'haaaa' ,
            'is_active' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'lol' ,
            'is_active' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'hamadaa' ,
            'is_active' => 1
        ]);
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
