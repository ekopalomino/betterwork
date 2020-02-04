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
        'certification',
        'reports',
        'materials',
    ];

    public function Parent()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function Docs()
    {
    	return $this->hasMany(EmployeeTrainingFile::class);
    }

    public function Statuses()
    {
        return $this->belongsTo(Status::class,'status');
    }
}
