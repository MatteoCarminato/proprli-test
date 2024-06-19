<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function constructions()
    {
        return $this->belongsTo(Construction::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
