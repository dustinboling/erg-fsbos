<div class="col">
    <div class="card text-center">
        {{-- <div class="card-header bg-primary" style="color:#ffffff">
            Search For Sale by Owner Listings
        </div> --}}
        <div class="card-body">
            {{-- <h5 class="card-title">Search For Sale by Owner listings in Lane County, Oregon</h5> --}}
            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
        <form class="" method="get" action="{{ route('listings.search') }}">
                <div class="form-row">
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect01" name="beds">
                                <option value="1" {{ (1 == old('beds', '1') ? 'selected' : '') }}>1+</option>
                                <option value="2" {{ (2 == old('baths') ? 'selected' : '') }}>2+</option>
                                <option value="3" {{ (3 == old('baths') ? 'selected' : '') }}>3+</option>
                                <option value="4" {{ (4 == old('baths') ? 'selected' : '') }}>4+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect01">Min Beds</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02" name="baths">
                                <option value="1" {{ (1 == old('baths', '1') ? 'selected' : '') }}>1+</option>
                                <option value="2" {{ (2 == old('baths') ? 'selected' : '') }}>2+</option>
                                <option value="3" {{ (3 == old('baths') ? 'selected' : '') }}>3+</option>
                                <option value="4" {{ (4 == old('baths') ? 'selected' : '') }}>4+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Min Baths</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                        <input type="number" class="form-control" placeholder="1500" aria-label="1500" aria-describedby="basic-addon2" name="sqft" value="{{ old('sqft', '0') }}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Min SqFt</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect03" name="min_price">
                                <option value="0" {{ (0 == old('min_price','0') ? 'selected' : '') }}>$0+</option>
                                <option value="100000" {{ (100000 == old('min_price') ? 'selected' : '') }}>100,000+</option>
                                <option value="200000" {{ (200000 == old('min_price') ? 'selected' : '') }}>200,000+</option>
                                <option value="300000" {{ (300000 == old('min_price') ? 'selected' : '') }}>300,000+</option>
                                <option value="400000" {{ (400000 == old('min_price') ? 'selected' : '') }}>400,000+</option>
                                <option value="500000" {{ (500000 == old('min_price') ? 'selected' : '') }}>500,000+</option>
                                <option value="600000" {{ (600000 == old('min_price') ? 'selected' : '') }}>600,000+</option>
                                <option value="700000" {{ (700000 == old('min_price') ? 'selected' : '') }}>700,000+</option>
                                <option value="800000" {{ (800000 == old('min_price') ? 'selected' : '') }}>800,000+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect03">Min Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04" name="max_price">
                                <option value="999999999" {{ (999999999 == old('max_price','999999999') ? 'selected' : '') }}>$900,000+</option>
                                <option value="800000" {{ (800000 == old('max_price') ? 'selected' : '') }}>$800,000</option>
                                <option value="700000" {{ (700000 == old('max_price') ? 'selected' : '') }}>$700,000</option>
                                <option value="600000" {{ (600000 == old('max_price') ? 'selected' : '') }}>$600,000</option>
                                <option value="500000" {{ (500000 == old('max_price') ? 'selected' : '') }}>$500,000</option>
                                <option value="400000" {{ (400000 == old('max_price') ? 'selected' : '') }}>$400,000</option>
                                <option value="300000" {{ (300000 == old('max_price') ? 'selected' : '') }}>$300,000</option>
                                <option value="200000" {{ (200000 == old('max_price') ? 'selected' : '') }}>$200,000</option>
                                <option value="100000" {{ (100000 == old('max_price') ? 'selected' : '') }}>$100,000</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect04">Max Price</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100 w-lg-auto text-uppercase">Search</button>
                    </div>
                </div>
                {{-- <div class="form-row">
                    <div class="col"><a href="#">Save this search</a></div>
                </div> --}}
            </form>
        </div>
    </div>
</div>
