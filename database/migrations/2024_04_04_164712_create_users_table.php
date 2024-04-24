<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('student_id')->primary();
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('token_expire')->nullable();
            $table->string('phone', 12)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ["M","F","O", null])->nullable();
            $table->text('address')->nullable();
            $table->string('profile_picture', 50)->default('avatar.jpg');
            $table->string('cover_picture', 50)->default('cover.png');
            $table->bigInteger('followers')->default('0');
            $table->text('about')->nullable();
            $table->text('skills')->nullable();
            $table->text('expertise')->nullable();
            $table->text('education')->nullable();
            $table->year('graduation_year');
            $table->enum('degree', ["BCA","BBA","MCA", null])->nullable()->default(null);
            $table->text('career_history')->nullable();
            $table->text('languages')->nullable();
            $table->text('projects')->nullable();
            $table->text('publications')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('github_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->boolean('profile_visibility')->default(true);
            $table->text('first_company')->nullable();
            $table->text('current_company')->nullable();
            $table->text('certificates')->nullable();
            $table->string('resume', 30)->nullable();
            $table->string('nickname', 100)->nullable();
            $table->string('hostel', 100)->nullable();
            $table->string('verification_document', 100);
            $table->timestamps();
            $table->timestamp('verified_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
            //new column add for forget password -altab
            $table->string('forget_token')->nullable(); // New column for temp_token
            $table->timestamp('forget_token_expire')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
