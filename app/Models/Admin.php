<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'admin_type',
        'created_at',
        'updated_at'
    ];
}
