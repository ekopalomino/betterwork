<?php

namespace iteos\Models;

use Illuminate\Database\Eloquent\Model;

class AssetDepreciation extends Model
{
    protected $fillable = [
    	'asset_id',
    	'depreciate_period',
    	'depreciate_value',
    ];
}
