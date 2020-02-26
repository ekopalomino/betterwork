<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    protected $fillable = [
    	'bank_account_id',
    	'transaction_date',
        'reference_no',
    	'payee',
        'description',
        'amount',
        'type',
        'balance',
        'status_id',
    ];

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }
}
