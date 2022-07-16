@extends('layouts.base')
@section('title', 'Login')
@section('content')

    <section class="inner-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <img src="{{ asset('storage/journals/leftimage/'.  $journal->leftimage) }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-lg-8">

                    @if (session()->has('error'))
                       <div class="alert alert-warning">
                        <strong>Warning!</strong> {{ session()->get('error') }}
                      </div>
                    @endif

                    <form action="{{ route('do-login') }}" method="post">
                        @csrf
                        <input type="hidden" name="journalID" value="{{ $journal->id }}">
                        <input type="hidden" name="companyID" value="{{ $company->id }}">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Email Address</label>
                            <input type="email" name="primaryEmailAddress" id="form2Example1"
                                class="form-control @error('primaryEmailAddress') is-invalid @enderror" />
                            @error('primaryEmailAddress')
                                <span class="invalid-feedback"> {{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example2">Password</label>
                            <input type="password" id="form2Example2" name="passWord"
                                class="form-control @error('passWord') is-invalid @enderror" />

                            @error('passWord')
                                <span class="invalid-feedback"> {{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>
                            </div>

                            <div class="col">
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="{{ route('show_register_form', [$company->companySEOURL, $journal->seo]) }}">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $(function() {
        @if (Session::has('message'))
            toastr.success('{{ Session::get('message') }}', 'Success');
        @elseif (Session::has('error'))
            toastr.danger('{{ Session::get('error') }}', 'Error');
        @endif
    });
</script>
@endsection
