<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('chat_id');
            $table->bigInteger('chatted_by');
            $table->foreign('chatted_by')->references('student_id')->on('users')->onDelete('cascade');
            $table->bigInteger('chatted_to');
            $table->foreign('chatted_to')->references('student_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('chats');
    }
};
