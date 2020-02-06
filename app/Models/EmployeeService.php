<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeService extends Model
{
    protected $fillable = [
    	'employee_id',
    	'position',
    	'report_to',
    	'grade',
    	'from',
    	'to',
    	'salary',
    	'contract',
        'is_active',
    ];

    public function Parent()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function Reporting()
    {
        return $this->belongsTo(Employee::class,'report_to');
    }
}
