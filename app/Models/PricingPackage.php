<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'allowed_days',
        'allowed_properties',
        'allowed_features',
        'allowed_photos',
        'allowed_videos',
    ];
    // hint : Accessories
    public function getPropertiesAttribute()
    {
        return $this->allowed_properties == -1 ? 'Unlimited' : $this->allowed_properties;
    }
    public function getFeaturesAttribute()
    {
        return $this->allowed_features == 0 ? 'No' : $this->allowed_features;
    }
}
