<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = [
    	'transaction_date',
    	'reference_no',
    	'account_name',
    	'payee',
    	'description',
    	'trans_type',
    	'amount',
    ];
}
