<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = "chats";
    protected $primaryKey = "chat_id";
    protected $fillable = [
        'chat_id',
        'chatted_by',
        'chatted_to',
        'created_at',
        'updated_at'
    ];    

    protected $with = ['getChattedBy', 'getChattedTo', 'getMessages'];

    function getChattedBy(){
        return $this->hasOne('App\Models\User','student_id','chatted_by');
    }
    function getChattedTo(){
        return $this->hasOne('App\Models\User','student_id','chatted_to');
    }
    
    function getMessages(){
        return $this->hasMany('App\Models\Message','chat_id','chat_id');
    }
}
