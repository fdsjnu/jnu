<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostJobCategory extends Model
{

    protected $fillable = ['post', 'job','category','vacancy','amount','noFee','applied','notPaid','feePaid','shortlisted','selected','allowed'];
    protected $table = 'postjobcategory';

    public function jobcategory()
    {
        
        return $this->hasOne("App\Category", "id", "category");
    } 

}
