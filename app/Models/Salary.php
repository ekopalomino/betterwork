<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
    	'employee_salary_id',
    	'basic_salary',
    	'jkk',
    	'jkm',
    	'bpjs',
    	'jht',
    	'jp',
    	'income_tax_year',
    	'income_tax_month',
    ];
}
