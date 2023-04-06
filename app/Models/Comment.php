<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'task_id'
    ];

    public function author() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
