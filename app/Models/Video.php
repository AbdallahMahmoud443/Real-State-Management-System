<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['video'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
