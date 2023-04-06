<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'theme',
        'user_id',
    ];


    public function comments() {
        return $this->hasMany(Comment::class, 'task_id', 'id');
    }

    public function author() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
