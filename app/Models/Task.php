<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['task_id',
        'user_id',
        'description',
        'deadline',
        'completed'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user');
    }
}
