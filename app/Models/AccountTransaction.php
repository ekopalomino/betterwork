<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $fillable = [
    	'account_statement_id',
    	'transaction_date',
    	'account_no',
    	'account_name',
    	'payee',
    	'description',
    	'amount',
    	'status_id',
    ];
}
