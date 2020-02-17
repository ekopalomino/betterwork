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
    ];

    public $incrementing = false;
}
