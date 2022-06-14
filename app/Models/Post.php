<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function subsection()
    {
        return $this->belongsTo(Subsection::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $fillable = [
        'user_id',
        'subsection_id',
        'title',
        'comment',
        'up_votes',
        'down_votes'
    ];
}
