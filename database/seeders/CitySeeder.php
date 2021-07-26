<?php

namespace Database\Seeders;

use App\Models\Common\City;
use App\Models\Common\Country;
use App\Models\Common\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'=>'Albany',
            'description'=>'Albany is New York capital',
            'state_id'=>State::first()->id
        ]);
    }
}
