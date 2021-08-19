<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');

            $table->string('price_range_from'); // price_in_hour
            $table->string('price_range_to'); // price_in_hour


            $table->string('certificate')->nullable(); // if `job_id` need certificate here it will be

            $table->boolean('active')->default(false); // todo: `false` until admin review
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
        Schema::dropIfExists('worker_jobs');
    }
}
