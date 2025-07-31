<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('call_logs', function (Blueprint $table) {
    $table->id();
    $table->string('agent_email');
    $table->string('to');
    $table->string('name')->nullable();
    $table->string('status')->default('initiated');
    $table->string('call_id')->nullable();
    $table->string('duration')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_logs');
    }
};
