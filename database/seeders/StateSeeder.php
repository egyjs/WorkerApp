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
            'country_id'=>Country::first()->id
        ]);
    }
}
