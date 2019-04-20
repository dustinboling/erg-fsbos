<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactFormSubmission;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;

class ContactFormSubmissionsController extends Controller
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
        return view('pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO
        //return $request;
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $submission = ContactFormSubmission::create($request->all());

        Mail::to('wvfsbos@eugenerealtygroup.com', 'ERG FSBO Team')
            ->send(new ContactFormSubmitted($submission));

        return back()
            ->withInput()
            ->with('status', 'Your message has been sent! We will be in touch with you shortly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactFormSubmission  $contactFormSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(ContactFormSubmission $contactFormSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactFormSubmission  $contactFormSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactFormSubmission $contactFormSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactFormSubmission  $contactFormSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactFormSubmission $contactFormSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactFormSubmission  $contactFormSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactFormSubmission $contactFormSubmission)
    {
        //
    }
}
