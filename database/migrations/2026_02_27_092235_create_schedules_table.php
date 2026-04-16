<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            
            $table->string('bg_color');   // Menyimpan kode warna HEX
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();

            $table->foreignId('app_id')->constrained('apps');
            $table->foreignId('pic_id')->constrained('users');
            $table->foreignId('ticket_id')->nullable()->constrained('tickets');

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
        Schema::dropIfExists('schedules');
    }
}
