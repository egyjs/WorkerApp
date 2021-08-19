<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();

            $table->string('firstname');
            $table->string('lastname');

            $table->string('phone')->unique();
            $table->string('email')->unique();

            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('balance')->default(0);
            $table->string('rate')->nullable()->default(null); // null mean there is no any rates yet

            //id
            $table->string('photo');

            $table->string('driver_license')->nullable(); // State-issued driver's license/ID card
            $table->string('driver_license_photo')->nullable();

            $table->string('ssn')->unique()->nullable(); // Social Security card
            $table->string('ssn_photo')->nullable();



            // location relation
            $table->bigInteger('country_id');
            $table->bigInteger('state_id');
            $table->bigInteger('city_id');

            $table->ipAddress('last_ip');

            $table->enum('status', App\Constants\DB::workerStatus)->default('REVIEW');


            $table->string('response_time')->nullable();// in_minute

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
