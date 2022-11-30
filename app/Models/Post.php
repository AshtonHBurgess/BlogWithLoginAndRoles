<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','id', 'created_by', 'updated_at','image_url'];

    function user(){
        return $this->belongsTo(User::class);
    }
    //over ride and tell it

}
