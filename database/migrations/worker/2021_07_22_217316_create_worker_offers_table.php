<?php

use App\Constants\DB;
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

            $table->integer('approximate_time')->default(60);

            $table->timestamp('user_accepted')->nullable();

            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();

            $table->string('start_pic')->nullable();
            $table->string('end_pic')->nullable();


            $table->enum('status', DB::workerOfferStatus)->default('OFFERED'); // OFFERED -> ACCEPTED -> [WAITING_WORKER]
            $table->enum('payment_status', DB::workerOfferPaymentStatus)->default('UNPAID');
            $table->enum('payment_type',DB::paymentTypes);

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
