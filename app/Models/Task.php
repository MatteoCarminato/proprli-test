<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'construction_id',
        'user_id',
    ];


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
