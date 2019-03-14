<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'code','description','status'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'code';
    }
     public function postjobcategory()
    {
        return $this->belongsTo(PostJobCategory::class);
    }
}
