<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * $table->foreignId('room_id')->constrained('workers')->onDelete('cascade');
         * we will create this in rooms chat
         */
        Schema::create('worker_offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_issue_id')->constrained('user_issues')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');


            $table->string('price'); // yes its string as column
            $table->text('description')->nullable();
            $table->timestamp('user_accepted')->nullable();

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
        Schema::dropIfExists('worker_offers');
    }
}
