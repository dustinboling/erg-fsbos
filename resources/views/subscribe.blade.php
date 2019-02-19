@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Subscribe')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>We'll Be Launching Very Soon!</h1>
            <p>Do you want to be notified when we launch? Use this form to subscribe to updates:</p>

            <form action="{{ url('subscribe') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="firstName" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lastName" placeholder="Last name">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                    {{-- <div class="col">
                        <input type="checkbox" value="1" name="group[555][1]" id="mce-group[555]-555-0"><label for="mce-group[555]-555-0"> Buying</label><br>
                        <input type="checkbox" value="2" name="group[555][2]" id="mce-group[555]-555-1"><label for="mce-group[555]-555-1"> Selling</label>
                    </div> --}}
                    <div class="col">
                        <button type="submit" class="btn btn-primary" value="submit">Subscribe</button>
                    </div>
                </div>
            </form>
            <hr class="my-4">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-3">Other Resources</h2>
            <dl>
                <dt>Information about buying a home</dt>
                <dd><a target="_blank" href="https://www.eugenerealtygroup.com/buying/">www.eugenerealtygroup.com/buying</a></dd>
                <dt>Top 10 Ways to Sell Faster and for More Money</dt>
                <dd><a target="_blank" href="https://eugenerealtygroup.realgeeks.com/blog/top-10-ways-sell-faster-and-more-money/">eugenerealtygroup.realgeeks.com/blog/top-10-ways-sell-faster-and-more-money</a></dd>
            </dl>
        </div>
    </div>

</div>
@endsection
