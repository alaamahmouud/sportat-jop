<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('settings_category_id');
            $table->string('key');
            $table->longText('value');
            $table->string('display_name');
            $table->enum('data_type', array('fileWithPreview','editor','textarea','number','email','date','text'));
            $table->integer('level')->nullable();
            $table->timestamps();
        });


        \App\Models\Setting::create([
            'settings_category_id' => 1,
            'key' => 'competition_rules',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum." ,
            'display_name' => 'Competition Rules',
            'data_type' => 'textarea' ,
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
        Schema::dropIfExists('settings');
    }
}

