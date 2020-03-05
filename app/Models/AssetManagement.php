<?php

namespace iteos\Models;

use iteos\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class AssetManagement extends Model
{
    use Uuid;

    protected $fillable = [
    	'name',
        'asset_code',
    	'category_name',
    	'purchase_date',
    	'purchase_price',
        'purchase_from',
    	'estimate_time',
    	'estimate_depreciate_value',
    	'status_id',
    ];

    public $incrementing = false;

    public function Categories()
    {
    	return $this->belongsTo(AssetCategory::class,'category_name','id');
    }
}
