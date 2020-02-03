<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class GrievanceComment extends Model
{
    protected $fillable = [
    	'grievance_id',
    	'comment',
    ];

    public function Parent()
    {
    	return $this->belongsTo(EmployeeGrievance::class,'grievance_id');
    }
}
