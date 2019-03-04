@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('seller-leads.store') }}" method="post">
        @csrf
        <h5 class="card-title">Your Contact Information</h5>
        <div class="form-row form-group">
            <div class="col">
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" value="{{ old('first_name') }}" id="inputFirstName" placeholder="Enter your first name" required>
            </div>
            <div class="col">
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" value="{{ old('last_name') }}" id="inputLastName" placeholder="Enter your last name" required>
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col">
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="tel" name="phone" value="{{ old('phone') }}" id="inputPhone" aria-describedby="phoneHelp" placeholder="Phone number" required>
                <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
            </div>
            <div class="col">
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" id="inputEmail" aria-describedby="emailHelp" placeholder="Email address" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        </div>
        {{-- Property Address --}}
        <h5 class="card-title">Your Property's Address</h5>
        <div class="form-row form-group">
            <div class="col">
                <input class="form-control {{ $errors->has('address_line_1') ? 'is-invalid' : '' }}" type="text" name="address_line_1" value="{{ old('address_line_1') }}" id="inputAddressLine1" placeholder="Street address" required>
            </div>
            <div class="col">
                <input class="form-control {{ $errors->has('address_line_2') ? 'is-invalid' : '' }}" type="text" name="address_line_2" value="{{ old('address_line_2') }}" id="inputAddressLine2" placeholder="Unit #">
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col">
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" value="{{ old('city') }}" id="inputAddressLine1" placeholder="City" required>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="state" value="Oregon" id="inputState" readonly>
            </div>
            <div class="col">
                <input class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" type="text" name="postal_code" value="{{ old('postal_code') }}" id="inputPostalCode" placeholder="Postal Code" required>
            </div>
        </div>


        <div class="form-row form-group">
            <div class="col">
                <textarea class="form-control w-100" name="message" id="inputMessage" cols="30" rows="5" placeholder="Any additional information?">{{ old('message') }}</textarea>
            </div>
        </div>
        <div class="form-row text-right">
            <div class="col">
                <button type="submit" class="btn btn-primary">Send Request</button>
            </div>
        </div>
    </form>
