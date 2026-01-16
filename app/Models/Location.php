<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'total_properties'
    ];
    
    // hint: defined relations
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
