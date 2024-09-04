<?php

namespace App\Models;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['cv','about','user_id'];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
