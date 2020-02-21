<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model
{
    protected $fillable = [
    	'transaction_date',
        'account_name',
        'item',
        'payee',
        'description',
        'amount',
        'type',
    	'status_id',
    	'created_by',
    	'updated_by',
    ];

    public $incrementing = false;

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }

    public function Accounts()
    {
        return $this->belongsTo(ChartOfAccount::class,'account_name','account_id');
    }
}
