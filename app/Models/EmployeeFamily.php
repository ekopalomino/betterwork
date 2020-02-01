<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFamily extends Model
{
    protected $fillable = [
    	'employee_id',
    	'first_name',
    	'last_name',
    	'relations',
    	'address',
    	'phone',
    	'mobile'
    ];
}
