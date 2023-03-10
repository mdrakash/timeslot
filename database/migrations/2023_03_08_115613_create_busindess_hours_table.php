<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusindessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busindess_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day')->unique();
            $table->string('from');
            $table->string('to');
            $table->unsignedInteger('step')->default(60);
            $table->boolean('holiday')->default(false)->nullable();
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
        Schema::dropIfExists('busindess_hours');
    }
}
