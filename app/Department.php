<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['email','name','shortName','hod','status'];
    //protected $table = 'departments';
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function jobposts()
    {
        return $this->belongsTo(JobPost::class);
    }


    public function getRouteKeyName()
    {
        return 'code';
    }
}

