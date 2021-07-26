<?php

namespace Database\Seeders;

use App\Models\Common\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'=>'United States',
            'description'=>'"America", "US", "USA"',
            'currency'=>'USD',
            'currency_code'=>'$',
            'iso'=>'US',
            'un_code'=>'1',
            'flag'=>'',
            'tax_percentage'=>0
        ]);
    }
}
