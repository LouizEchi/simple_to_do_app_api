<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tweet'
    ];

    public function user()
    {
        return $this->belongsTo('users');
    }

    public function scopeUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeTweet($query, $tweet)
    {
        if($tweet)
        {
            return $query->where('tweet', $tweet);
        }
    }
}
