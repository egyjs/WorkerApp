<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_issues', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('worker_id')
                ->nullable()
                ->constrained('workers')
                ->onDelete('cascade');

            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->foreignId('user_address_id')->constrained('user_addresses')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->text('description');

            $table->date('date');

            $table->time('time_from')->nullable(); // will assign after select worker
            $table->time('time_to')->nullable(); // will assign after select worker

            $table->enum('status', App\Constants\DB::userIssuesStatus)->default('PENDING');
            /**
             * @column more_info
             * will be an object hav the Q and the A
             */
            $table->json('more_info')->nullable();

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_issues');
        Schema::enableForeignKeyConstraints();
    }
}
