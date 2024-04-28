<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primaryKey = "comment_id";
    protected $fillable = [
        'comment_id',
        'post_id',
        'posted_by',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $with = ['getUser'];
    
    function getUser(){
        return $this->hasOne('App\Models\User','student_id','posted_by');
    }
}
