<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Listing extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    /**
     * Get the agent that owns the listing
     */
    public function agent()
    {
        return $this->belongsTo('App\Agent', 'agent_id', 'id');
    }

    /**
     * Get the city that owns the listing
     */
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    /**
     * Register Spatie Medialibrary collections
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery');
    }

    /**
     * Register Spatie Medialibrary conversions
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('slide')
        ->crop('crop-center', 825, 464); // 16:9 Ratio

        $this->addMediaConversion('square')
        ->crop('crop-center', 512, 512);
    }
}
