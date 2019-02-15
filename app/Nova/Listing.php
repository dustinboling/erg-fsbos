<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class Listing extends Resource
{
    /**
    * The model the resource corresponds to.
    *
    * @var string
    */
    public static $model = 'App\Listing';

    /**
    * The single value that should be used to represent the resource when being displayed.
    *
    * @var string
    */
    public static $title = 'street_address';

    /**
    * The columns that should be searched.
    *
    * @var array
    */
    public static $search = [
        'id', 'street_address', 'city', 'state', 'zip', 'community', 'neighborhood'
    ];

    /**
    * Get the fields displayed by the resource.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function fields(Request $request)
    {
        return [
            Number::make('Price')->rules('required')->sortable(),
            new Panel('Location Information', $this->locationFields()),
            new Panel('Features', $this->featureFields()),
            ID::make()->sortable(),
            Images::make('Photos', 'listing') // second parameter is the media collection name
            ->conversion('slide') // conversion used to display the "original" image
            ->conversionOnView('square') // conversion used on the model's view
            ->thumbnail('square') // conversion used to display the image on the model's index page
            ->multiple() // enable upload of multiple images - also ordering
            ->singleImageRules('dimensions:min_width=1024'), // validation rules for the collection of images
        ];
    }

    /**
    * Get the location fields for the resource.
    *
    * @return array
    */
    public function locationFields()
    {
        return [
            Text::make('Street Address')->rules('required'),
            Text::make('City')->rules('required')->sortable(),
            Text::make('State')->sortable(),
            Text::make('Zip')->sortable(),
            Text::make('Community')->sortable()->hideFromIndex(),
            Text::make('Neighborhood')->sortable()->hideFromIndex(),
        ];
    }

    /**
    * Get the feature fields for the resource.
    *
    * @return array
    */
    public function featureFields()
    {
        return [
            Trix::make('Description'),
            Number::make('Beds')->sortable(),
            Number::make('Baths')->sortable(),
            Number::make('Half Baths')->sortable(),
            Number::make('Sqft')->sortable(),
        ];
    }

    /**
    * Get the cards available for the request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function cards(Request $request)
    {
        return [];
    }

    /**
    * Get the filters available for the resource.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function filters(Request $request)
    {
        return [];
    }

    /**
    * Get the lenses available for the resource.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
    * Get the actions available for the resource.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function actions(Request $request)
    {
        return [];
    }
}
