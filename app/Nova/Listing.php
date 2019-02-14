<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Trix;

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
            Trix::make('Description'),
            Text::make('Street Address'),
            Text::make('City')->sortable(),
            Text::make('State')->sortable(),
            Text::make('Zip')->sortable(),
            Number::make('Price')->sortable(),
            Number::make('Beds')->sortable(),
            Number::make('Baths')->sortable(),
            Number::make('Half Baths')->sortable(),
            Number::make('Sqft')->sortable(),
            Text::make('Community')->sortable()->hideFromIndex(),
            Text::make('Neighborhood')->sortable()->hideFromIndex(),
            ID::make()->sortable(),
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
