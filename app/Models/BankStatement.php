<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    protected $fillable = [
    	'bank_id',
    	'statement_period',
    	'balance',
    	'status_id',
    ];

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }
}
