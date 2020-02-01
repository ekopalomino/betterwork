<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    protected $fillable = [
    	'employee_id',
    	'training_provider',
    	'training_title',
    	'location',
    	'from',
    	'to',
    	'status',
    ];
}
