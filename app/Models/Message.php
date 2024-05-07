<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = "messages";
    protected $primaryKey = "message_id";
    protected $fillable = [
        'message_id',
        'chat_id',
        'my_message',
        'user_message',
        'created_at',
        'updated_at'
    ];
}
