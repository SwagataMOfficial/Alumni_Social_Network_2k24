<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'password',
        'remember_token',
        'token_expire',
        'phone',
        'dob',
        'gender',
        'address',
        'profile_picture',
        'cover_picture',
        'followers',
        'about',
        'skills',
        'expertise',
        'education',
        'graduation_year',
        'degree',
        'career_history',
        'languages',
        'projects',
        'publications',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'github_link',
        'linkedin_link',
        'profile_visibility',
        'first_company',
        'current_company',
        'certificates',
        'resume',
        'nickname',
        'hostel',
        'verification_document',
        'created_at',
        'updated_at',
        'deleted_at',
        'verified_at',
    ];
}
