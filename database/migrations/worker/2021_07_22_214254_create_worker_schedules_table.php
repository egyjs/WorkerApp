<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');
            $table->time('from');
            $table->time('to');

            $table->string('day'); // #test1
            $table->boolean('active')->default(1);

            $table->unique(['worker_id','day']);
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
        Schema::dropIfExists('worker_schedules');
    }
}
