<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = ['student_name', 'student_email','solution', 'points', 'task_id', 'is_evaluated'];

    use HasFactory;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
