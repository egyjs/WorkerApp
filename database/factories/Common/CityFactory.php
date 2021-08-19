<?php

namespace Database\Factories\Common;

use App\Models\Common\City;
use App\Models\Common\State;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $state_id = cache()->remember('state_id_CityFactory', 360*60*60*60,function (){
            return State::first()->id;
        });

        return [
            'name'=>$this->faker->city,
            'description'=>$this->faker->address,
            'state_id'=>$state_id,
            'lat'=>$this->faker->latitude(),
            'lng'=>$this->faker->longitude(),
        ];
    }
}
