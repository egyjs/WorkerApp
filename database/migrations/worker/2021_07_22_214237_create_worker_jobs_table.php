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

            $table->string('certificate')->nullable(); // if `job_id` need certificate here it will be

            $table->boolean('active')->default(false); // `false` until admin review
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
