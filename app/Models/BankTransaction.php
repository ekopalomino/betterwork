<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $fillable = [
    	'bank_statement_id',
    	'transaction_date',
    	'account_no',
    	'account_name',
    	'payee',
    	'description',
    	'amount',
    ];
}
