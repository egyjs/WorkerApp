<?php

namespace Database\Seeders;

use App\Models\Common\Country;
use App\Models\Common\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name'=>'New York',
            'description'=>'New York is a state in the Mid-Atlantic and Northeastern regions of the United States. It was one of the original thirteen colonies forming the United States.',
            'iso'=>'NY',
            'country_id'=>Country::first()->id,
            'lat'=>'40.7127753',
            'lng'=>'-74.0059728',
        ]);

        State::create([
            'name'=>'Indiana',
            'description'=>'Indiana...',
            'iso'=>'IN',
            'country_id'=>Country::first()->id,
            'lat'=>'40.2671941',
            'lng'=>'-86.1349019',
        ]);

        State::create([
            'name'=>'Colorado',
            'description'=>'Colorado...',
            'iso'=>'CO',
            'country_id'=>Country::first()->id,
            'lat'=>'39.5500507',
            'lng'=>'-105.7820674',
        ]);

        State::create([
            'name'=>'Pennsylvania',
            'description'=>'Pennsylvania...',
            'iso'=>'PA',
            'country_id'=>Country::first()->id,
            'lat'=>'41.2033216',
            'lng'=>'-77.1945247',
        ]);

        State::create([
            'name'=>'',
            'description'=>'Maine...',
            'iso'=>'ME',
            'country_id'=>Country::first()->id,
            'lat'=>'45.253783',
            'lng'=>'-69.44546889999999',
        ]);
    }
}
