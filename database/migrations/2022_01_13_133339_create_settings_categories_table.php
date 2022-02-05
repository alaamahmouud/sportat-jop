<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('level')->nullable();
            $table->timestamps();
        });

        \App\Models\SettingsCategory::create([
            'name' => 'Competition Rules',
            'level' => 1
         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_categories');
    }
}
