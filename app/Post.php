<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image_name','title', 'slug', 'resume', 'content', 'author', 'post_date', 'status', 'user_id'];
    
    protected $dates = ['post_date', 'created_at', 'updated_at'];

    public function comments(){
                return $this->hasMany('App\Comment','post_id','id');
            }
    public function user(){
                return $this->belongsTo('App\User','user_id','id');
            }        
}
