<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveTransaction extends Model
{
    protected $fillable = [
    	'leave_id',
    	'leave_type',
    	'leave_start',
    	'leave_end',
    	'notes',
        'amount_requested',
        'status_id',
    ];

    public function Parent()
    {
    	return $this->belongsTo(EmployeeLeave::class,'leave_id');
    }

    public function Statuses()
    {
        return $this->belongsTo(Status::class,'status_id');
    }

    public function Types()
    {
        return $this->belongsTo(LeaveType::class,'leave_type');
    }

}
