<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use App\Nova\Filters\LiveListings;
use App\Nova\Metrics\ListingCount;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\ListingsPerMonth;
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
        'id', 'street_address', 'zip', 'community', 'neighborhood'
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
            Boolean::make('Live?','is_live')->sortable(),
            //Text::make('Status')->sortable(),
            Select::make('Status')->options([
                'Coming Soon' => 'Coming Soon',
                'For Sale by Owner' => 'For Sale',
                'Pending' => 'Pending',
                'Sold' => 'Sold',
            ])->rules('required')->sortable(),
            Number::make('Price')->rules('required')->sortable(),
            new Panel('Location', $this->locationFields()),
            new Panel('Features', $this->featureFields()),
            new Panel('Photos', $this->photoField()), // validation rules for the collection of images
            ID::make()->hideFromIndex(),
            HasMany::make('Leads'),
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
            BelongsTo::make('City'),
            Text::make('State')->rules('required')->hideFromIndex(),
            Text::make('Zip')->rules('required')->sortable(),
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
            Number::make('Beds')->rules('required')->sortable(),
            Number::make('Baths')->rules('required')->sortable(),
            Number::make('Half Baths')->rules('required')->hideFromIndex(),
            Number::make('Sqft')->rules('required')->sortable(),
            Trix::make('Description')->alwaysShow(),
        ];
    }

    /**
    * Get the feature fields for the resource.
    *
    * @return array
    */
    public function photoField()
    {
        return [
            Images::make('Photos', 'gallery') // second parameter is the media collection name
                ->conversion('slide') // conversion used to display the "original" image
                ->conversionOnView('square') // conversion used on the model's view
                ->thumbnail('square') // conversion used to display the image on the model's index page
                ->multiple() // enable upload of multiple images - also ordering
                ->singleImageRules('dimensions:min_width=1280')
                ->hideFromIndex(),
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
        return [
            (new ListingCount)->width('1/4'),
            (new ListingsPerMonth)->width('3/4'),
        ];
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
            new LiveListings,
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
