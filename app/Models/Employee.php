<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Uuid;

    protected $fillable = [
    	'employee_id',
    	'first_name',
    	'last_name',
    	'date_of_birth',
    	'place_of_birth',
    	'sex',
    	'picture',
    	'address',
    	'phone',
    	'mobile',
    	'email',
    	'id_card',
    	'created_by',
    	'updated_by',
    ];

    public $incrementing = false;

    public function Author()
    {
    	return $this->belongsTo(User::class,'created_by');
    }

    public function Editor()
    {
    	return $this->belongsTo(User::class,'updated_by');
    }
}
