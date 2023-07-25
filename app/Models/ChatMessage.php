<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
// In the ChatMessage model




    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the method to check if the message is liked by the user
    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function isDislikedByUser($userId)
    {
        return $this->dislikes()->where('user_id', $userId)->exists();
    }

    public function likes()
    {
        return $this->hasMany(MessageLike::class, 'message_id');
    }

    public function dislikes()
    {
        return $this->hasMany(MessageDislike::class, 'message_id');
    }
}
