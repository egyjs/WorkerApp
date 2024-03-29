<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_wallets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');
            $table->string('transaction_desc')->nullable();
            $table->enum('type', ['OUT', 'IN',])->default('IN');
            $table->string('amount')->default(0);
            $table->string('open_balance')->default(0);
            $table->string('close_balance')->default(0);

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
        Schema::dropIfExists('worker_wallets');
    }
}
