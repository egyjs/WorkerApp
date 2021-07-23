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
            $table->foreignId('user_address_id')->constrained('user_addresses')->onDelete('cascade');

            $table->string('name');
            $table->text('description');

            $table->enum('status', App\Constants\DB::userIssuesStatus);
            /**
             * @column more_info
             * will be an object hav the Q and the A
             *
             */
            $table->json('more_info');

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
        Schema::dropIfExists('user_issues');
    }
}
