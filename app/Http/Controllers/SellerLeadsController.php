<?php

namespace App\Http\Controllers;

use App\SellerLead;
use Illuminate\Http\Request;

class SellerLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        SellerLead::create(request()->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'address_line_1' => 'present',
            'address_line_2' => 'present',
            'city' => 'present',
            'state' => 'present',
            'postal_code' => 'present',
            'message' => 'present',
        ]));

        return back()
            ->withInput()
            ->with('status', 'Your request to add your property has been sent! We will be in touch shortly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellerLead  $sellerLead
     * @return \Illuminate\Http\Response
     */
    public function show(SellerLead $sellerLead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerLead  $sellerLead
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerLead $sellerLead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerLead  $sellerLead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerLead $sellerLead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerLead  $sellerLead
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerLead $sellerLead)
    {
        //
    }
}
