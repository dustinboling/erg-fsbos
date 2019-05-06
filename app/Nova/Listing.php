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
use Laravel\Nova\Fields\Heading;
use App\Nova\Filters\LiveListings;
use App\Nova\Metrics\ListingCount;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Filters\FeaturedListings;
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
        'id', 'street_address', 'zip', 'call_code', 'text_code'
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
            Heading::make('<h3 class="">Website Status</h3>')->asHtml(),
            ID::make()->hideFromIndex(),
            Boolean::make('Live')->sortable(),
            Boolean::make('Featured')->sortable(),

            Heading::make('<h3 class="">Listing Info</h3>')->asHtml(),
            Select::make('Status')
                ->options([
                    'active' => 'Active',
                    'pending' => 'Pending',
                    'sold' => 'Sold'
                ])
                ->displayUsingLabels()
                ->rules('required')
                ->sortable(),
            BelongsTo::make('Agent'),
            Number::make('Price')->rules('required')->sortable(),
            Text::make('Call Code')->hideFromIndex(),
            Text::make('Text Code')->hideFromIndex(),

            new Panel('Location', $this->locationFields()),
            new Panel('Property Features', $this->featureFields()),
            new Panel('Photos', $this->photoField()), // validation rules for the collection of images
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
            Heading::make('<h3 class="">Address</h3>')->asHtml(),
            Text::make('Street Address')->rules('required'),
            BelongsTo::make('City'),
            Text::make('State')->rules('required')->hideFromIndex(),
            Text::make('Zip')->rules('required')->sortable(),
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
            Heading::make('<h3 class="">Property Features</h3>')->asHtml(),
            Number::make('Beds')->rules('required')->sortable(),
            Number::make('Baths')->rules('required')->sortable(),
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
                ->singleImageRules('dimensions:min_width=825')
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
            new FeaturedListings,
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
