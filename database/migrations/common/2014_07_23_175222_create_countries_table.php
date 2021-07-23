<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // trans
            $table->json('description')->nullable(); // trans
            $table->string('currency'); // USD
            $table->string('currency_code'); // $
            $table->string('iso',2); // US
            $table->integer('un_code'); // 1,20,966

            $table->string("flag")->nullable();
            $table->string("tax_percentage")->default(0);

            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('countries');
    }
}
