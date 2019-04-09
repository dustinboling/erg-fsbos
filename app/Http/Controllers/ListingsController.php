<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::orderBy('price', 'desc')
            ->where('is_live', true)
            ->get();

        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $images = $listing->getMedia('gallery');
        $similarListings = Listing::latest()
            ->where([
                ['is_live', true],
                ['id', '!=', $listing->id],
                ['city_id', $listing->city->id],
            ])
            ->take(8)
            ->get();

        return view('listings.show', compact('listing', 'images', 'similarListings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->flash();

        $validatedData = $request->validate([
            'beds' => 'required|numeric|min:0|max:99',
            'baths' => 'required|numeric|min:0|max:99',
            'sqft' => 'required|numeric|min:0|max:99999',
            'min_price' => 'required|numeric|min:0|max:999999999',
            'max_price' => 'required|numeric|min:0|max:999999999'
        ]);

        //dd($validatedData);

        $listings = Listing::orderBy('price', 'desc')
            ->where([
                ['is_live', true],
                ['beds', '>=', (int)$validatedData['beds']],
                ['baths', '>=', (int)$validatedData['baths']],
                ['sqft', '>=', (int)$validatedData['sqft']],
                ['price', '>=', (int)$validatedData['min_price']],
                ['price', '<=', (int)$validatedData['max_price']]
            ])
            ->get();

        return view('listings.index', compact('listings'));
    }
}
