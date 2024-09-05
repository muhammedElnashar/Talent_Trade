<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function jobPosts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobPost::class, 'category_id');
    }
}
