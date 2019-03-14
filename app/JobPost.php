<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{

    protected $fillable = ['post', 'code','department','session','postNo','description','desirable','startDate','startingTime','closeDate','closingTime','status','uAcadmic','uTeachExp','uResExp','uPreDetails','uNoc','uResArt','uResPub','created_by','updated_by'];
    protected $table = 'jobpost';

    public function departments()
    {
        
        return $this->hasOne("App\Department", "id", "department");
    } 
    public function designations()
    {
    	return $this->hasOne("App\Designation", "id", "post");
    }

    

}
