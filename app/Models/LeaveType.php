<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = [
    	'leave_name',
        'first_approval',
        'second_approval',
    	'created_by',
    	'updated_by',
    ];

    public function Author()
    {
    	return $this->belongsTo(Employee::class,'created_by');
    }

    public function Editor()
    {
    	return $this->belongsTo(Employee::class,'updated_by');
    }
}
