@extends('layouts.base')
@section('title', 'Register')
@section('content')

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <img src="{{ asset('storage/journals/leftimage/'.  $seos->leftimage) }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-lg-8">
                    @if (Session::has('message'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form class="" name="frmRegister" id="frmRegister" action="{{ route('do-register') }}" method="POST">
                        <input type="hidden" name="journalID" value="{{ $seos->id }}" />
                        <input type="hidden" name="companyID" value="{{ $companies->id }}" />

                        @csrf

                        <div class="info-box">
                            <div class="box-body">
                                <h3 class="heading-info">Personal Information:</h3>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label" for="prefix">Prefix *</label>
                                        <select name="prefix" id="prefix" class="form-control select-control @error('prefix') is-invalid @enderror">
                                            <option value="Dr." @if (old('prefix') == 'Dr.') selected @endif>Dr.</option>
                                            <option value="Mr." @if (old('prefix') == 'Mr.') selected @endif>Mr.</option>
                                            <option value="Mrs." @if (old('prefix') == 'Mrs.') selected @endif>Mrs.</option>
                                            <option value="Ms." @if (old('prefix') == 'Ms.') selected @endif>Ms.</option>
                                            <option value="Miss." @if (old('prefix') == 'Miss.') selected @endif>Miss.</option>
                                            <option value="Prof." @if (old('prefix') == 'Prof.') selected @endif>Prof.</option>
                                        </select>
                                        @error('prefix')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="firstName">First Name *</label>
                                        <input type="text" name="firstName" id="firstName" required value="{{ old('firstName') }}"
                                            class="form-control @error('firstName') is-invalid @enderror"
                                            placeholder="First Name">
                                        @error('firstName')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="middleName">Middle Name</label>
                                        <input type="text" name="middleName" id="middleName" class="form-control"  value="{{ old('middleName') }}" placeholder="Middle Name">
                                        {{-- @error('middleName')
                                                <span class="invalid-feedback"> {{ $message }}</span>
                                            @enderror --}}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="lastName">Last Name *</label>
                                        <input type="text" name="lastName" id="lastName" required  value="{{ old('lastName') }}"
                                            class="form-control @error('lastName') is-invalid @enderror"
                                            placeholder="Last Name">
                                        @error('lastName')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="primaryEmailAddress">Primary Email Address *</label>
                                        <input type="email" name="primaryEmailAddress" id="primaryEmailAddress"
                                            placeholder="Primary Email Address" required  value="{{ old('primaryEmailAddress') }}"
                                            class="form-control @error('email') is-invalid @enderror" />
                                        @error('email')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contactNumber">Contact Number</label>
                                        <input type="text" name="contactNumber" id="contactNumber"  value="{{ old('contactNumber') }}"
                                            placeholder="Enter your mobile number" class="form-control" />
                                    </div>


                                </div>


                                <!-- Password input -->
                                <div class="row mb-4">

                                    <div class="col-md-6">
                                        <label class="form-label" for="password">Password *</label>
                                        <input type="password" name="password" id="password" placeholder="Password"
                                        required class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label" for="password_confirmation">Confirm Password *</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm Password" required
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>


                        <h3 class="heading-info">Address Information:</h3>
                        <div class="row mb-4">

                            <div class="col-md-6">
                                <label class="form-label" for="cpassword">Institution *</label>
                                <input type="institution" name="institution" id="institution" placeholder="Institution"
                                required value="{{ old('institution') }}" class="form-control @error('institution') is-invalid @enderror">
                                @error('institution')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cpassword">Department *</label>
                                <input type="text" name="department" id="department" placeholder="Department"
                                required   value="{{ old('department') }}"  class="form-control @error('department') is-invalid @enderror">
                                @error('department')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label" for="cpassword">Address *</label>
                                <input type="text" name="address" id="cpassword" placeholder="Address"
                                required  value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cpassword">Country *</label>
                                <select name="country" id="country" class="form-control form-select" required>
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option @if (old('country') ==  $country->name) selected @endif value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label" for="postal_code">Postal Code *</label>
                                <input type="text" name="postal_code" id="postal_code" placeholder="Postal code"
                                required   value="{{ old('postal_code') }}"   class="form-control @error('postal_code') is-invalid @enderror">
                                @error('postal_code')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="cpassword">City *</label>
                                <input type="text" name="city" id="city" placeholder="City"
                                required   value="{{ old('city') }}"  class="form-control @error('city') is-invalid @enderror">
                                @error('city')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>


                        </div>

                        {{-- <div class="row mb-4">
                            <div class="col-md-6">
                                <select name="companyID" id="companyID" class="form-control companyID">
                                    <option {{ $companies->id }}>Select Company</option>
                                    @foreach ($company as $company)
                                        <option>{{ $company->companyName }}</option>
                                    @endforeach
                                </select>
                                @error('companyID')
                                    <span class="invalid-feedback"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}


                        <div class="row mb-4">

                            <div class="col-lg-5 col-md-5">
                                <h3 class="heading-info">Areas of Interest or Expertise:</h3>

                                <div class="card border" id="list1">
                                    <ul>
                                        @foreach ($areaofinterset as $category)
                                            <li style="list-style: none;">{{ $category->title }}
                                                @if (count($category->subcategory))
                                                    @include('frontend.subCategoryList', [
                                                        'subcategories' => $category->subcategory,
                                                    ])
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>



                            <div class="col-lg-2 align-middle pt-4 col-md-2">
                                <div class="card " id="list_btns">
                                    <br>
                                    <input type="button" id="btn1" class="btn btn-sm btn-success"
                                        value="Add >>" />
                                    <br>
                                    <input type="button" id="btn2" class="btn btn-sm btn-danger"
                                        value="<< Remove" />
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="heading-info">Selected Classifications: </h3>
                                <div class="card border" id="list2">
                                    <!-- selected classifications goes here -->
                                </div>
                            </div>

                        </div>






                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" name="agree" type="checkbox" value="1" id="agree" required />
                                    <label class="form-check-label" for="agree"> I agree to the <a href="#!">Terms &amp; Conditions</a> </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="btnRegister" class="btn btn-primary btn-block mb-4">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>



    <script type="text/javascript">
        $(function() {

            $("input[type='checkbox']").change(function() {
                $(this).siblings('ul')
                    .find("input[type='checkbox']")
                    .prop('checked', this.checked);
            });


            $("#btn1").click(function() {
                //alert('i m here');
                $("#list1 input[type='checkbox']:checked").each(function() {
                    var int_id = $(this).val();
                    var title = $(this).attr("data-title");
                    $(this).prop('disabled', true);
                    $('#list2').append(
                        '<ul style="list-style: none; margin-bottom:0px;"><li><input type="checkbox" name="interest_selected[]" value="' +
                        int_id + '" checked /> ' + title + '</li></ul>');
                });

            });



            $("#btn2").click(function() {
                $("#list2 option:selected").each(function() {
                    $(this).remove("list1");
                });

                $("#list2 input[type='checkbox']:checked").each(function() {
                    var int_id = $(this).val();
                    var title = $(this).attr("data-title");
                    //alert(int_id);
                    $(this).parent().parent().remove();
                    $('#list1 #select_' + int_id).prop('disabled', false);
                    $('#list1 #select_' + int_id).prop('checked', false);
                    //$(this). prop('disabled', true);
                    //$('#list2').append('<ul style="list-style: none; margin-bottom:0px;"><li><input type="checkbox" name="interest_selected[]" value="'+int_id+'" checked /> '+title+'</li></ul>');
                });

            });



        });
    </script>




@endsection
