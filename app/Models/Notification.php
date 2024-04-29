<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    use HasFactory;

    protected $table = "notifications";

    protected $primaryKey = "notification_id";

    protected $fillable = [
        'notification_id',
        'notified_to',
        'n_description',
        'type',
        'url',
        'read_at',
        'created_at',
        'updated_at'
    ];
}
