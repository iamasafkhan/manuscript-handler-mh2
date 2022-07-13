@extends('layouts.admin')

@section('title', 'add_companies')

@section('content')


@if(session()->has('status'))
<div class="alert alert-success">
    {{ session('status')}}
</div>
@endif

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3 pb-3 border-bottom">
            Add Company</h4>
        <form method="post" action="{{ route('store-companies')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('companyName') is-invalid @enderror" id="companyName" name="companyName" placeholder="company name">
                        <label for="companyName">Company Name</label>
                        @error('companyName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('companyShortName') is-invalid @enderror" id="companyShortName" name="companyShortName" placeholder="Company short name">
                        <label for="companyShortName">Company Short Name</label>
                        @error('companyShortName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="url" class="form-control @error('companySEOURL') is-invalid @enderror" id="companySEOURL" name="companySEOURL" placeholder="Company SEO URL">
                        <label for="companySEOURL">Company SEO URL</label>
                        @error('companySEOURL')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('companyEmailAddress') is-invalid @enderror" id="companyEmailAddress" name="companyEmailAddress" placeholder="Company email address">
                        <label for="companyEmailAddress">Company Email Address</label>
                        @error('companyEmailAddress')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('companyPhoneNumber') is-invalid @enderror" id="companyPhoneNumber" name="companyPhoneNumber" placeholder="Company phone number">
                        <label for="companyPhoneNumber">Company Phone Number</label>  
                         @error('companyPhoneNumber')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('companyWebsite') is-invalid @enderror" id="companyWebsite" rows="5" name="companyWebsite" placeholder="Company website">
                        <label for="companyWebsite">Company Website:</label>
                        @error('companyWebsite')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <textarea type="text" class="form-control @error('companyAddress') is-invalid @enderror" id="companyAddress" rows="5" name="companyAddress" placeholder="Company address"></textarea>
                        <label for="companyAddress">Company Address:</label>
                        @error('companyAddress')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control @error('companyLogo') is-invalid @enderror" id="companyLogo" name="companyLogo" placeholder="companyLogo">
                        <label for="companyLogo">Company Logo</label>
                        @error('companyLogo')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <textarea type="text" class="form-control @error('companyDescription') is-invalid @enderror" id="companyDescription" rows="5" name="companyDescription" placeholder="Company description"></textarea>
                        <label for="companyDescription">Company Description</label>
                        @error('companyDescription')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>



                <div class="col-12">
                    <div class="d-md-flex align-items-center mt-3">

                        <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class="btn btn-success font-weight-medium rounded-pill px-4">
                                <div class="d-flex align-items-center">
                                    Submit
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection