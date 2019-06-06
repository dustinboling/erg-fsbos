<?php

namespace App\Nova\Metrics;

use App\Listing;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class NewListingsPerMonth extends Trend
{
    public $name = "New Listings per Month";

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByMonths($request, Listing::class);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            6 => '6 Months',
            12 => '12 Months',
            24 => '24 Months',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'new-listings-per-month';
    }
}
