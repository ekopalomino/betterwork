<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    protected $fillable = [
    	'bank_account_id',
    	'transaction_date',
    	'account_name',
    	'payee',
        'description',
        'amount',
        'type',
        'status_id',
    ];

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }
}
