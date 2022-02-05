<?php

use Illuminate\Database\Seeder;
use App\Models\Nationalty ;
class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Nationalty::truncate();


        $json = File::get("database/data/nationality.json");
        $nationalities = json_decode($json);

        foreach ($nationalities as $key => $value) {
            Nationalty::create([
                "name" => $value->name,
                "is_active" =>1
            ]);
        }
    }
}
