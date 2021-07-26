<?php

namespace Database\Seeders;

use App\Models\Common\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (empty(DB::table('countries')->count())) {
            $this->call([
                CountrySeeder::class,
                StateSeeder::class,
                CitySeeder::class,
            ]);
        }
        Job::factory()
            ->count(50)
            ->create();
        // \App\Models\User::factory(10)->create();
    }
}
