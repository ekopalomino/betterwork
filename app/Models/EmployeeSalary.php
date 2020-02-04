<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use Uuid;

    protected $fillable = [
    	'employee_id',
    	'payroll_period',
    	'total_payroll',
    	'total_allowance',
    	'total_renumeration',
    	'receive_payroll',
    	'status_id',
    	'created_by',
    	'approved_by',
    ];

    public $incrementing = false;
}
