<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TechnologyJob extends Model
{
    use HasFactory;
    protected $fillable=['technology_id','job_post_id'];
    public function job_post(){
        return $this->belongsTo(JobPost::class,'job_post_id');
    }
}
