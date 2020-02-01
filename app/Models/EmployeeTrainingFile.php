<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTrainingFile extends Model
{
    protected $fillable = [
    	'employee_training_id',
    	'filename',
    ];
}
