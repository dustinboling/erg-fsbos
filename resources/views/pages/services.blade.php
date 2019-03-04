@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Services')

@section('content')
    <div class="container pb-4">
        <div class="row">
            <div class="col">
                <h1 id="page-title">Services</h1>
                <p>We help For Sale By Owner (FSBO) sellers market their properties online. Our highly trafficked website, Willamette Valley FSBO’s.com, is a one stop place to see most of the FSBO’s currently available in the Willamette Valley.</p>
                <p>Advantages for buyers include the ability to see the majority of available FSBO’s in one location and speak with a licensed real estate broker about the home buying process, the pre-approval process and to learn more about the homes featured on our website. We can help you schedule a tour of any available homes and are here to answer any questions you may have.</p>
                <p>Advantages for sellers include FREE exposure through our website to reach thousands of buyers every month, a licensed real estate broker’s help with finding buyers for your home without a fee, and help answering all of the inquiries about your home which can save you a lot of time.</p>
                <p>Feel free to contact us at any time! A friendly and professional real estate broker will be available to talk with you about buying a home or advertising your FSBO on our website (free of charge). We look forward to being of service!</p>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center font-weight-bolder">Send a Request to Add Your FSBO Property to this Website</div>
                    <div class="card-body">
                        @include('pages.partials.sellerleadform')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
