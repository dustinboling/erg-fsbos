@extends('layouts.app')

@section('title', 'Willamette Valley FSBOs - Subscribe')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Launching Soon!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quos voluptate illo ab, non ratione reiciendis quis repudiandae eos quasi voluptatibus ad quia sapiente dolores, vero. Accusantium, placeat a veritatis!</p>

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
        </div>
    </div>

</div>
@endsection
