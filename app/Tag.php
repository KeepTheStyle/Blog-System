<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name','slug','user_id'];
    public function posts(){
        //Session::flash('success','Tag created!');
        return $this->belongsToMany('App\Post');
    }
}
