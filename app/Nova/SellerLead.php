<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Textarea;
use App\Nova\Metrics\SellerLeadsCount;
use App\Nova\Metrics\SellerLeadsPerDay;
use Laravel\Nova\Http\Requests\NovaRequest;

class SellerLead extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\SellerLead';

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
        'id', 'name', 'address_line_1',
    ];

    /**
    * The logical group associated with the resource.
    *
    * @var string
    */
    public static $group = 'Leads';

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return "Seller Leads";
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return "Seller Lead";
    }

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
            new Panel('Seller', $this->sellerFields()),
            new Panel('Property Address', $this->addressFields()),
        ];
    }

    /**
     * Get the seller fields for the resource
     *
     * @return array
     */
    protected function sellerFields()
    {
        return [
            Text::make('Name', function () {
                return $this->first_name.' '.$this->last_name;
            }),
            Text::make('First Name')->rules('required', 'string'),
            Text::make('Last Name')->rules('required', 'string'),
            Text::make('Phone'),
            Text::make('Email')->rules('required', 'email'),
            Textarea::make('Message')->alwaysShow(),
        ];
    }

    /**
    * Get the address fields for the resource.
    *
    * @return array
    */
    protected function addressFields()
    {
        return [
            Text::make('Address', 'address_line_1')
                ->rules('required'),
            Text::make('Address Line 2')->hideFromIndex(),
            Text::make('City')
                ->rules('required'),
            Text::make('State')
                ->hideFromIndex()
                ->rules('required'),
            Text::make('Postal Code')
                ->hideFromIndex()
                ->rules('required'),
            //Country::make('Country')->hideFromIndex(),
            Text::make('Latitude')->hideFromIndex(),
            Text::make('Longitude')->hideFromIndex(),
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
