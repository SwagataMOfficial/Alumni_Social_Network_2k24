<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpost extends Model
{
    use HasFactory;

    protected $table = "user_posts";
    protected $primaryKey = "post_id";

    protected $fillable = [
        'post_id',
        'posted_by',
        'post_description',
        'registration_link',
        'attachment',
        'likes',
        'comment_count',
        'comments',
        'visibility',
        'post_type',
        'reported_at',
        'created_at',
        'updated_at',
        'deleted_at	'
    ];

    function getUser(){
        return $this->hasOne('App\Models\User','student_id','posted_by');
    }
    function getLikedUser(){
        return $this->hasMany('App\Models\Like','post_id','post_id');
    }
    
}
