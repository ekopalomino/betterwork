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

    public function Parent()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function Docs()
    {
    	return $this->hasMany(EmployeeTrainingFile::class);
    }
}
