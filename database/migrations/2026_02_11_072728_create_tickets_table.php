<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique(); // TIK-202402-001
            $table->string('subject');
            $table->text('description');
            $table->text('vulnerability_details')->nullable();
            
            // Foreign Keys Utama
            $table->foreignId('requester_id')->constrained('users'); // Pelapor
            $table->foreignId('tester_id')->nullable()->constrained('users'); // Teknisi
            $table->foreignId('app_id')->constrained('apps');
            
            // Foreign Keys Klasifikasi
            $table->foreignId('priority_id')->constrained('priorities');
            $table->foreignId('severity_id')->nullable()->constrained('severities');
            $table->foreignId('status_id')->constrained('statuses');
            
            // Timestamps SLA
            $table->dateTime('resolved_at')->nullable();
            
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
        Schema::dropIfExists('tickets');
    }
}
