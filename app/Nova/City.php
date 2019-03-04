<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\HasMany;
use Benjaminhirsch\NovaSlugField\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class City extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\City';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
    ];

    /**
    * The logical group associated with the resource.
    *
    * @var string
    */
    public static $group = 'Admin';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            HasMany::make('Listings'),
            TextWithSlug::make('City Name', 'name')
                ->slug('URL Slug')
                ->rules('required')
                ->sortable(),
            Slug::make('URL Slug', 'slug')
                ->rules('required'),
            Text::make('SEO Title', 'title')
                ->rules('required'),
            Trix::make('Content')->alwaysShow(),
            Images::make('Photos', 'listing') // second parameter is the media collection name
                ->conversion('slide') // conversion used to display the "original" image
                ->conversionOnView('square') // conversion used on the model's view
                ->thumbnail('square') // conversion used to display the image on the model's index page
                ->multiple() // enable upload of multiple images - also ordering
                ->singleImageRules('dimensions:min_width=1024'), // validation rules for the collection of images
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
