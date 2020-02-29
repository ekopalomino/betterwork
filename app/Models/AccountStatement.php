<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model
{
    use Uuid;

    protected $fillable = [
    	'transaction_date',
        'reference_no',
        'payee',
        'status_id',
    	'created_by',
    	'checked_by',
        'approved_by',
        'posted_by',
    ];

    public $incrementing = false;

    public function Statuses()
    {
    	return $this->belongsTo(Status::class,'status_id');
    }

    public function Accounts()
    {
        return $this->belongsTo(ChartOfAccount::class,'account_id');
    }

    public function Child()
    {
        return $this->hasMany(JournalEntry::class,'account_statement_id');
    }
}
