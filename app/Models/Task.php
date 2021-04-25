<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'points', 'subject_id'];

    use HasFactory;

    public function suject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
