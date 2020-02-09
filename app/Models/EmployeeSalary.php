<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $fillable = [
    	'payroll_period',
    	'employee_no',
    	'nett_salary',
    	'jkk',
    	'jkm',
    	'leave_balance',
    	'rewards',
    	'expense',
    	'bpjs',
        'jht',
        'jp',
        'income_tax',
        'receive_payroll',
        'status_id',
        'created_by',
        'approved_by',
    ];

    public function Statuses()
    {
        return $this->belongsTo(Status::class,'status_id');
    }

    public function Uploader()
    {
        return $this->belongsTo(Employee::class,'created_by');
    }

    public function Approval()
    {
        return $this->belongsTo(Employee::class,'approved_by');
    }
}
