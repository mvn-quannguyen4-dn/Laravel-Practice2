<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'address',
        'tel',
        'user_id',
        'province',
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
