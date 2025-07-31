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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Assigned user
            $table->string('title');
            $table->string('email');
            $table->text('description')->nullable();
            $table->string('phone')->nullable(); // For task-related numbers
            $table->text('note')->nullable(); // Additional notes/comments from the admin
            $table->string('name')->nullable(); // Name associated with the task
            $table->string('country')->nullable(); // Country of the task or user
            $table->string('url')->nullable(); // Country of the task or user
            $table->string('prefer_contact_type')->nullable(); // Country of the task or user


            $table->string('language')->nullable(); // Language preference or task language
            $table->boolean('is_completed')->default(false); // To track task completion
            $table->text('comment')->nullable(); // Field for user comments
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
