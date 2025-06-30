<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesGallery extends Model
{
    //
    protected $fillable = ['image'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }


}
