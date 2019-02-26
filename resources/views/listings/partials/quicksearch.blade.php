<div class="col">
    <div class="card text-center">
        {{-- <div class="card-header bg-primary" style="color:#ffffff">
            Search For Sale by Owner Listings
        </div> --}}
        <div class="card-body">
            {{-- <h5 class="card-title">Search For Sale by Owner listings in Lane County, Oregon</h5> --}}
            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
        <form class="" method="get" action="{{ route('listings.index') }}">
                <div class="form-row">
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect01" name="bedrooms">
                                <option selected>1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect01">Min Beds</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02" name="bathrooms">
                                <option selected>1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Min Baths</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-2 mb-2">
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="1500" aria-label="1500" aria-describedby="basic-addon2"  name="sqft">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Min SqFt</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect03" name="min_price">
                                <option selected>$0+</option>
                                <option value="100000">100,000+</option>
                                <option value="200000">200,000+</option>
                                <option value="300000">300,000+</option>
                                <option value="400000">400,000+</option>
                                <option value="500000">500,000+</option>
                                <option value="600000">600,000+</option>
                                <option value="700000">700,000+</option>
                                <option value="800000">800,000+</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect03">Min Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04" name="max_price">
                                <option selected>$900,000+</option>
                                <option value="800000">$800,000</option>
                                <option value="700000">$700,000</option>
                                <option value="600000">$600,000</option>
                                <option value="500000">$500,000</option>
                                <option value="400000">$400,000</option>
                                <option value="300000">$300,000</option>
                                <option value="200000">$200,000</option>
                                <option value="100000">$100,000</option>
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
