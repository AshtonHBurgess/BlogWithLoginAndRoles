<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','id', 'created_by', 'updated_at','image_url'];
//

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }


    function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by');
    }
//    function user(){
//        return $this->belongsTo(User::class);
//    }
    //over ride and tell it

}
