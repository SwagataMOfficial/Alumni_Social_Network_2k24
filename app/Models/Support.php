<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    
        protected $table = 'supports';
        protected $PrimaryKey="id";
        
        protected $fillable = [
            'student_id',
            'query',
            'reply',
            'created_at',
            'updated_at'
        ];
}

