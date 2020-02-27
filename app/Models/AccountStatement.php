<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model
{
    protected $fillable = [
    	'transaction_date',
        'trans_group',
        'reference_no',
        'account_id',
        'bank_id',
        'item',
        'payee',
        'description',
        'amount',
        'trans_type',
    	'status_id',
    	'created_by',
    	'updated_by',
        'checked_by',
        'approved_by',
    ];

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }

    public function Accounts()
    {
        return $this->belongsTo(ChartOfAccount::class,'account_id');
    }

    public function Banks()
    {
        return $this->belongsTo(BankAccount::class,'bank_id');
    }
}
