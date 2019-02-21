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
                            <div class="card-header">Send us an email message using this form</div>
                            <div class="card-body">
                                <form action="{{ route('contact') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" type="name" name="name" id="inputName" placeholder="Enter your name">
                                    </div>
                                    <div class="form-group">
                                            <input class="form-control" type="email" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter your email address">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                    <div class="form-group">
                                        <textarea class="form-control" class="w-100" name="message" id="inputMessage" cols="30" rows="10" placeholder="Type your message"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>{{-- .card --}}
                    </div>
                    <div class="col-md-6">
                        <img class="w-100 rounded shadow-sm" src="https://picsum.photos/540/?random" alt="Contact Eugene Realty Group">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
