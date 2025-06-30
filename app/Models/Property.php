<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // hint: defined Relations
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
    public function images()
    {
        return $this->hasMany(ImagesGallery::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
