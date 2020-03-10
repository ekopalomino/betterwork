<?php

namespace iteos\Console\Commands;

use Illuminate\Console\Command;
use iteos\Models\AssetManagement;
use iteos\Models\AssetDepreciation;
use Carbon\Carbon;

class Depreciation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'depreciation:month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate asset depreciation per month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $assets = AssetManagement::where('status_id','81828ad9-fea7-41ff-b6d2-769fbc47c3fa')->get();
        foreach($assets as $asset) {
            $getCurRecord = AssetDepreciation::where('asset_id',$asset->id)->orderBy('updated_at','DESC')->first();
            $getCurItem = AssetManagement::where('id',$asset->id)->first();
            if(($asset->method_id) == '1') {
                $yearValue = ($asset->purchase_price - $asset->residual_value)/$asset->estimate_time;
                $monthValue = $yearValue/12;

                if(isset($getCurRecord)) {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $getCurRecord->closing_value,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $getCurRecord->closing_value - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                } else {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $asset->purchase_price,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $asset->purchase_price - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                }   
            } elseif(($asset->method_id) == '2') {

            } elseif(($asset->method_id) == '3') {
                $yearPercent = 150 / $getCurItem->estimate_time;
                $yearValue = ($asset->purchase_price - $asset->residual_value) * ($yearPercent/100);
                $monthValue = $yearValue/12;

                if(isset($getCurRecord)) {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $getCurRecord->closing_value,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $getCurRecord->closing_value - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                } else {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $asset->purchase_price,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $asset->purchase_price - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                }
            } elseif(($asset->method_id) == '4') {
                $yearPercent = 200 / $getCurItem->estimate_time;
                $yearValue = ($asset->purchase_price - $asset->residual_value) * ($yearPercent/100);
                $monthValue = $yearValue/12;

                if(isset($getCurRecord)) {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $asset->purchase_price,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $asset->purchase_price - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                } else {
                    $depValue = AssetDepreciation::create([
                        'asset_id' => $asset->id,
                        'depreciate_period' => Carbon::now()->toDateTimeString(),
                        'opening_value' => $asset->purchase_price,
                        'depreciate_value' => $monthValue,
                        'closing_value' => $asset->purchase_price - $monthValue, 
                    ]);
                    if(($depValue->closing_value) == '0') {
                        $update = $getCurItem->update([
                            'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                        ]);
                    }
                }
            } elseif(($asset->method_id) == '5') {
                $depValue = AssetDepreciation::create([
                    'asset_id' => $asset->id,
                    'depreciate_period' => Carbon::now()->toDateTimeString(),
                    'opening_value' => $asset->purchase_price,
                    'depreciate_value' => $monthValue,
                    'closing_value' => $asset->purchase_price - $monthValue, 
                ]);
                $update = $getCurItem->update([
                    'status_id' => '99d1e6f4-51be-4fef-a82f-16b86ca9f086',
                ]);
            }
        }
    }
}
