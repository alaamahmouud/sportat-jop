<?php

use Illuminate\Database\Seeder;
use App\Models\Country ;
class CountriesSeeder extends Seeder {

    public function run()
    {
      Country::truncate();


        $json = File::get("database/data/nationality.json");
        $nationalities = json_decode($json);

        foreach ($nationalities as $key => $value) {
            Country::create([
                "name" => $value->name,
                "is_active" =>1
            ]);
        }
    }
}
