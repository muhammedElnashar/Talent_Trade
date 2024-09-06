<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['technology_name'];
    public function candidate(){
        return $this->belongsToMany(Candidate::class,'candidate_technologies');
    }
}
