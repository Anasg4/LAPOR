<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('rewards')) {
            Schema::dropIfExists('rewards');
        }
        Schema::create('rewards', function (Blueprint $table) {
            $table->string('id', 6);
            $table->primary('id');
            $table->string('name');
            $table->integer('point');
            $table->string('image');
            $table->string('description');
            $table->string('redeem_code', 6)->unique();
            $table->integer('user_id')->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('reward_status');
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
        Schema::dropIfExists('rewards');
    }
}
