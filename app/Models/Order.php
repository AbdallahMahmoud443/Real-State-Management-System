<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = ['id'];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function package()
    {
        return $this->belongsTo(PricingPackage::class);
    }
}
