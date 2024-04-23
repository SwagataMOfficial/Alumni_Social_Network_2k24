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
        Schema::create('user_posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->bigInteger('posted_by');
            $table->foreign('posted_by')->references('student_id')->on('users')->onDelete('cascade');
            $table->text('post_description')->nullable()->default(null);
            $table->text('attachment')->nullable()->default(null);
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('comment_count')->default(0);
            $table->text('comments')->nullable();
            $table->boolean('visibility')->default(true);
            $table->enum('post_type', ["post", "job"])->default('post');
            $table->timestamp('reported_at')->nullable()->default(null);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_posts');
    }
};
