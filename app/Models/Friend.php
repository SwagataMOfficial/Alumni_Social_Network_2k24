<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model {
    use HasFactory;

    protected $table = "friends";
    protected $primaryKey = "id";

    protected $fillable = [
        'student_id',
        'friend_id',
        'accepted_at',
        'is_pending',
        'created_at',
        'updated_at'
    ];

    protected $with = ["getStudent", "getFriend"];

    function getStudent(){
        return $this->hasOne('App\Models\User','student_id','student_id');
    }
    function getFriend(){
        return $this->hasOne('App\Models\User','student_id','friend_id');
    }
}
