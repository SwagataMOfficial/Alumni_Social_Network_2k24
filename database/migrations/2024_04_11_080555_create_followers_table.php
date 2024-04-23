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
        Schema::create('followers', function (Blueprint $table) {
            $table->id('sl_no');
            $table->bigInteger('user_id');
            $table->bigInteger('followed_by');
            $table->foreign('user_id')->references('student_id')->on('users');
            $table->foreign('followed_by')->references('student_id')->on('users');
            $table->timestamp('started_following')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
