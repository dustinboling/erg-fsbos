@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow">
                <div class="card-header">My Account</div>

                <div class="card-body">

                    <p class="card-text font-weight-bolder mt-2 mb-4">Use this form to update your account information.</p>

                    <form action="{{ route('users.update', auth()->user()) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="inputName">Full name</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter full name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                                <label for="inputPhone">Phone number</label>
                                <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Enter phone number" value="{{ $user->phone }}">
                            </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email address" value="{{ $user->email }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email address with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
