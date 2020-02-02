<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use Uuid;

    protected $fillable = [
    	'employee_id',
    	'leave_type',
    	'notes',
    	'leave_start',
    	'leave_end',
    	'status_id',
    ];

    public $incrementing = false;

    public function Employees()
    {
    	return $this->belongsTo(Employee::class,'employee_id');
    }

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }
}
