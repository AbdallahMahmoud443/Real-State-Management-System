<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //


    protected $guarded = ['id'];

    protected $casts = [
        'purchase_date' => 'date',
        'expire_date' => 'date',
        'price' => 'decimal:2'
    ];
    // hint: Days Accessors
    public function getTotalDaysAttribute()
    {
        if (!$this->purchase_date || !$this->expire_date) {
            return null;
        }
        return $this->purchase_date->diffInDays($this->expire_date);
    }
    public function getDaysRemainingAttribute()
    {
        if (!$this->expire_date) {
            return null;
        }
        return (int) now()->diffInDays($this->expire_date, false); // false = signed difference
    }
    public function getIsExpiredAttribute()
    {
        if (!$this->expire_date) {
            return false;
        }
        return $this->expire_date->isPast();
    }

    // hint: relations
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function package()
    {
        return $this->belongsTo(PricingPackage::class);
    }
}
