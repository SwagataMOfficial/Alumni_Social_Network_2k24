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
        'last_message_sent_by',
        'last_message',
        'last_message_sent_at',
        'created_at',
        'updated_at'
    ];    

    protected $with = ['getMe', 'getOther', 'getMessages'];

    function getMe(){
        return $this->hasOne('App\Models\User','student_id','chatted_by');
    }
    function getOther(){
        return $this->hasOne('App\Models\User','student_id','chatted_to');
    }
    
    function getMessages(){
        return $this->hasMany('App\Models\Message','chat_id','chat_id');
    }
}
