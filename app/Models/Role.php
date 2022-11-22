<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','id'];
    function users(){

        return $this->belongsToMany(User::class);
    }


//    public function role_user()
//    {
//        return $this->belongsToMany(User::class,'user_roles','role_id','user_id');
//    }

}


