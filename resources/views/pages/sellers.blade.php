@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Sellers')

@section('content')
    <div class="container py-4 my-4">
        <div class="row text-center">
            <div class="col">
                <h1 id="page-title" class="mb-1">Are You Open to Working with a Buyer’s Agent?</h1>
                <h2>How about one that actually helps you try to find a buyer?</h2>
                <p class="w-75 mx-auto mb-0">Whether you are thinking of selling your home on your own, without a real estate professional, or already have your home for sale on your own, we designed this website with you in mind. For Sale by Owners face a few challenges that we are here to help solve. We offer a FREE service to help with marketing and buyer follow up. Here’s a bit more info about how it works:</p>
            </div>
        </div>
    </div>
    <div class="bg-white py-4">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <h4>FREE Online Marketing of Your Property</h4>
                    <p>One of the first and biggest problems that For Sale by Owner’s face is the issue of obscurity. Not enough potential buyers know that your property is on the market. You probably know that most buyers begin their home search online, but the question is how do you best reach them? This is the first area where we can help.</p>
                    <p>What you might not know is that typically when a home is listed with a real estate brokerage it reaches hundreds of websites through an Internet exchange service called IDX. On these websites (many of them are brokerage websites) FSBO listings are not included. What this means is that buyers think they are seeing everything on the market on these websites but the truth is that they would have to specifically go searching for your home, which may not be easily found by them.</p>
                    <p>We are offering to solve this problem by marketing your home on our website <a href="https://www.willamettevalleyfsbos.com/">www.WillametteValleyFSBOs.com</a> and then driving traffic to your home by linking to it from our highly trafficked <a href="https://www.eugenerealtygroup.com/">Eugene Real Estate</a> brokerage website (which receives 31,000+ unique visitors each month) and also by running targeted Facebook, You Tube and Google ads to this website so that consumers from all over will find your home. It will be hard to miss, which will lead to more awareness, increased buyer interest and a higher likelihood of you selling your home faster.</p>
                    <hr class="w-25 my-4">
                </div>
                <div class="col-md">
                    <h4>FREE 24/7 Technology Tools to Reach Buyers at Their Convenience</h4>
                    <p>One of the other biggest problems that For Sale by Owner’s face is that buyers are becoming increasingly reluctant to pick up the phone and call for information and prefer easier, more convenient and more self-serve style ways of obtaining information about homes for sale.</p>
                    <p>We are offering to solve this problem by offering a dedicated phone number where buyers can call 24 hours a day, 7 days a week to learn more about your home. We also offer a dedicated number they can text 24 hours a day, 7 days a week to also instantly receive more info about your home as well. These are the exact same tools we use for our real estate clients so we know they work and that buyers like the ease of use of this technology.</p>
                    <hr class="w-25 my-4">
                    <h4>Screening Calls and Helping Buyers Get Qualified</h4>
                    <p>Many For Sale by Owners find that they receive calls from buyers who are not pre-approved or perhaps not very knowledgeable about the home buying process. This is one more area where we can help.</p>
                    <p>We will screen the buyer calls for you and help buyers through the process of finding a good lender and understanding how to buy a home if they need assistance. We will act as your concierge and schedule showings with you directly with any interested buyers that inquire about your home. We will handle the large volume of calls and inquiries, which will save you time and hassle. Many buyers feel more comfortable talking to a neutral third party, real estate professional instead of the seller directly and feel they can be more candid and ask more questions. We feel that by offering this you are more likely to receive more inquiries.</p>
                    <hr class="w-25 my-4">
                    <h4>Marketing and Hosting Open Houses</h4>
                    <p>Another thing we’ve learned over the years is that many For Sale by Owners have expressed frustration at the time it takes to prepare for, properly market and host an open house. If you would like to have help with these tasks, we will be happy to host open houses for you and we’ll even market them for you to increase the interest and traffic for each one. This is all part of our FREE service.</p>
                </div>

                <div class="col-md-6">
                    {{-- Seller Lead Form --}}
                    <div class="card">
                        <div class="card-header text-center text-light font-weight-bold bg-primary">Add Your FSBO Property to this Website</div>
                        <div class="card-body" style="background-color: #f2f2f2;">
                            <p class="card-text">Do you want to maximize the exposure of your For Sale by Owner property? Use this form to send a request to add your FSBO property to this website and receive information on additional FREE services available to you.</p>
                            @include('pages.partials.sellerleadform')
                        </div>
                    </div>
                    {{--/ Seller Lead Form --}}
                </div>
                <div class="col-md-12 text-center">
                    <p class="text-primary font-weight-bold my-4" style="font-size:2rem">Call Us Today: <a href="tel:+15417996622">(541) 799-6622</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
