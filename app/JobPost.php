<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = ['post', 'code','department'];
    protected $table = 'jobpost';

    public function department()
    {
        return $this->belongsTo(Department::class);
    } 
}
