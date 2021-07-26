<?php

namespace Database\Factories\Common;

use App\Models\Common\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->jobTitle,
            'description'=>$this->faker->emoji,
            'type'=>1,
            'required_cert'=>false,
        ];
    }
}
