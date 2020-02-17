<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
    	'category_id',
    	'title',
    	'content',
    	'created_by',
    ];

    public function Author()
    {
    	return $this->belongsTo(Employee::class,'created_by');
    }
}
