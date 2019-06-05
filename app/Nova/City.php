<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use App\Nova\Filters\LiveCities;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use App\Nova\Metrics\CitiesCount;
use Laravel\Nova\Fields\MorphMany;
use App\Nova\Metrics\ListingsPerCity;
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
    public static $group = 'Content';

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
            Boolean::make('Live')->sortable(),
            TextWithSlug::make('City Name', 'name')
                ->slug('URL Slug')
                ->rules('required')
                ->sortable(),
            Text::make('State'),
            Slug::make('URL Slug', 'slug')
                ->rules('required'),
            Text::make('SEO Title', 'title')
                ->rules('required'),
            Trix::make('Content')->alwaysShow(),
            Images::make('Main Image', 'main')
                ->conversion('slide') // conversion used to display the "original" image
                ->conversionOnView('square') // conversion used on the model's view
                ->thumbnail('square') // conversion used to display the image on the model's index page
                ->singleImageRules('dimensions:min_width=512'), // validation rules for the collection of images

            HasMany::make('Listings'),
            MorphMany::make('Views'),
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
        return [
            new LiveCities,
        ];
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
