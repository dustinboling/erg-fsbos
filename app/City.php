<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "cities";

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    public function listings()
    {
        return $this->hasMany('App\Listing', 'city_id', 'id');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('slide')
            ->crop('crop-center', 1920, 1080) // 1080P Resolution
            ->withResponsiveImages();

        $this->addMediaConversion('square')
            ->crop('crop-center', 512, 512)
            ->withResponsiveImages();
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('main')->singleFile();
    }

    /**
     * Get all of the city's views.
     */
    public function views()
    {
        return $this->morphMany('App\View', 'viewable');
    }
}
