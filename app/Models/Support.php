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
            // You might not need to specify 'id', 'created_at', and 'updated_at' as fillable, 
            // as they are typically managed by Laravel automatically.
        ];
}

