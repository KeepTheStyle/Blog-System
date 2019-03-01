<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at'];
    protected $fillable = ['title','content','category_id','img_path','slug','user_id'];
    public function getNewpathAttribute($newpath){

        return asset($newpath);
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
