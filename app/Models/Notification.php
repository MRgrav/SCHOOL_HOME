<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'user_id',
    ];

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
