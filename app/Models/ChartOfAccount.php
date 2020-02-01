<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use Uuid;

    protected $fillable = [
    	'account_id',
    	'account_name',
    	'account_category',
    	'account_parent',
    	'created_by',
    	'updated_by',
    ];

    public $incrementing = false;

    public function Author()
    {
    	return $this->belongsTo(User::class,'created_by');
    }

    public function Editor()
    {
    	return $this->belongsTo(User::class,'updated_by');
    }
}
