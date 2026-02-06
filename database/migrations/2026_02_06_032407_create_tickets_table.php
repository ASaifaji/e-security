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
            
            // Foreign Keys Utama
            $table->foreignId('requester_id')->constrained('users'); // Pelapor
            $table->foreignId('assigned_id')->nullable()->constrained('users'); // Teknisi
            
            // Foreign Keys Klasifikasi
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('priority_id')->constrained('priorities');
            $table->foreignId('severity_id')->nullable()->constrained('severities'); // Sesuai diagram
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('asset_id')->nullable()->constrained('assets');
            
            // Timestamps SLA
            $table->dateTime('sla_due_at')->nullable();
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
