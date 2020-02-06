<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AppraisalTarget extends Model
{
    protected $fillable = [
    	'data_id',
        'appraisal_id',
    	'target',
    	'job_weight',
    	'target_real',
    	'weight_real',
    ];

    public function Data()
    {
    	return $this->belongsTo(AppraisalData::class,'data_id');
    }
}
