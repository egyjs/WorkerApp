<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->id();

            // related user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_issue_id')->constrained('user_issues')->onDelete('cascade');
            $table->foreignId('worker_offer_id')->constrained('worker_offers')->onDelete('cascade');
            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');

            $table->string('worker_profit_percent'); // 90%
            $table->string('worker_profit_amount'); // 90% of 300 = 270$
            $table->string('garry_profit_percent'); // 10%
            $table->string('garry_profit_amount'); // 10% of  300 = 30

            $table->string('garry_tax_amount'); // 15% of 30 = 4.5
            $table->string('garry_profit_amount_after_tax'); // 30 - 4.5 = 25.5

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
        Schema::dropIfExists('profits');
    }
}
