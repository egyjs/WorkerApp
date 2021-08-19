<?php

namespace Database\Factories\Worker;

use App\Constants\DB;
use App\Helpers\StorageHelper;
use App\Models\Common\City;
use App\Models\Worker\Worker;
use App\Models\Worker\WorkerDevice;
use App\Models\Worker\WorkerJob;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Worker $user) {
            //
        })->afterCreating(function (Worker $user) {
            WorkerDevice::create([
                "unique_id" => uniqid(),
                "platform" => "web",
                "app_version" => "1.0.0",
                'worker_id'=>$user->id,
                'ip'=>$this->faker->ipv4(),
                'loggedin_at' => Carbon::now(),
                'loggedout_at' => null,
            ]);

            WorkerJob::create([
                'worker_id'=>$user->id,
                'job_id'=>1,
                'price_range_from'=>rand(0,30),
                'price_range_to'=>rand(31,60),
                'certificate' => null,
                'active' => 1,
            ]);

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "firstname" => "Worker",
            "lastname" => $this->faker->lastName(),
            "phone" => rand(1223,1214530223),
            "password" => bcrypt('12345678'),
            "country_id" => 1,
            "state_id" => 1,
            "city_id" => City::inRandomOrder()->first()->id,
            "driver_license" => "F255-9215-0121-03",
            "photo" => "workers/photos/6108716fe70951627943279-a_a.jpg",
            "driver_license_photo" => "workers/driver_license_photos/6108716fe75ae1627943279-50_MB_to_kB.png",
            "email" => uniqid().time()."@garry.com",
            "last_ip" => "127.0.0.1",
            'status' => 'APPROVED',
            'rate'=>(bool)rand(0,1)?rand(1,5):null
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
