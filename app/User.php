<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function access_token()
    {
        return $this->hasOne('access_tokens');
    }

    public function tasks()
    {
        return $this->hasMany('tasks');
    }

    public function projects()
    {
        return $this->hasMany('projects');
    }

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
