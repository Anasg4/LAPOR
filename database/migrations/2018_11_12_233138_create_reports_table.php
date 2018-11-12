<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reports')) {
            Schema::dropIfExists('reports');
        }

        Schema::create('reports', function (Blueprint $table) {
            $table->string('id', 6);
            $table->primary('id');
            $table->string('number');
            $table->string('violation');
            $table->string('description');
            $table->string('location');
            $table->text('image');
            $table->tinyInteger('report_status')->default(0);
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reports');
    }
}
