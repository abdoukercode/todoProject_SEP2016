<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model


{
   /* protected $fillable = ['title'];*/
   protected $guarded=['id','updated_at'];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
