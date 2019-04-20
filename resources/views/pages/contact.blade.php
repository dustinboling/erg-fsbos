@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Contact Us')

@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col">
                <h1 id="page-title">Contact Us</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Send Us an Email</div>
                            <div class="card-body">
                                <form action="{{ route('contact.store') }}" method="post">
                                    @csrf
                                    <div class="form-row form-group">
                                        <div class="col"><input class="form-control" type="name" name="name" id="inputName" placeholder="Enter your name" value="{{ old('name') }}"></div>
                                        <div class="col"><input class="form-control" type="tel" name="phone" id="inputPhone" placeholder="Enter your phone number" value="{{ old('phone') }}"></div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                        <input class="form-control" type="email" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter your email address" value="{{ old('email') }}">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                        <textarea class="form-control" class="w-100" name="message" id="inputMessage" cols="30" rows="10" placeholder="Type your message">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row text-right">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>{{-- .card --}}
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Call Us</div>
                            <div class="card-body">
                                <h3 class="text-center">(541) 799-6622</h3>
                            </div>
                        </div>{{-- .card --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
