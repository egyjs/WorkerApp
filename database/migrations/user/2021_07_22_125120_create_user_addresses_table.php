<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // as talabat

            $table->string('name'); // alias as `my place`
            $table->string('street_name');

            $table->enum('type',\App\Constants\DB::building_types);

            $table->text('building_name'); //
            $table->string('floor_no')->nullable(); // no need in VILLA;
            $table->string('building_no')->nullable(); // no need in VILLA;
//            $table->string('office_name')->nullable();// only need id type = OFFICE;

            $table->text('details')->nullable();// ex. Special Marks

            $table->string('postal_code');

            $table->integer('phone_code'); //  20
            $table->integer('phone'); // 123456789

            $table->boolean('primary')->default(0);



            // location relation // auto based on geolocation
            $table->bigInteger('country_id'); // auto
            $table->bigInteger('state_id')->nullable(); // auto
            $table->bigInteger('city_id'); // auto

            // geolocation
            $table->string('lat');
            $table->string('lng');

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
        Schema::dropIfExists('user_addresses');
    }
}
