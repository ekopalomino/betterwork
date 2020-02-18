<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model
{
    use Uuid;

    protected $fillable = [
    	'account_period',
    	'status_id',
    	'created_by',
    	'updated_by',
    ];

    public $incrementing = false;

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }
}
