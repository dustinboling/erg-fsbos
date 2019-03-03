<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('slide')
        ->crop('crop-center', 1024, 768)
        ->withResponsiveImages();

        $this->addMediaConversion('square')
        ->crop('crop-center', 512, 512)
        ->withResponsiveImages();
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('listing');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function leads()
    {
        return $this->hasMany('App\Lead');
    }
}
