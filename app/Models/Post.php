<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function user(){
        return $this->hasOne(\App\Models\User::class);
    }
    public function comments(){
        return $this->hasMany(\App\Models\Post::class);
    }
}
