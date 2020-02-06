<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AppraisalComment extends Model
{
    protected $fillable = [
    	'appraisal_id',
    	'data_id',
    	'comment_by',
    	'comments',
    ];
}
