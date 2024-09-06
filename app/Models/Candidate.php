<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    use HasFactory;
    protected $fillable = ['user_id', 'about', 'cv','title','location','education','phone'];
    public function technology(){
        return $this->belongsToMany(Technology::class,'candidate_technologies');
    }

 
}
