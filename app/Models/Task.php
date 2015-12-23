<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_id', 
        'title',
        'description',
        'due_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('users');
    }

    public function project()
    {
        return $this->belongsTo('projects');
    }

    public function tasks()
    {
        return $this->hasMany('tasks', 'parent_id');
    }

    public function sub_task()
    {
        return $this->belongsTo('tasks');
    }

    public function scopeUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
