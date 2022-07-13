@extends('layouts.admin-auth')

@section('content')

<div class="col-lg-4 col-xl-3 bg-info auth-box-2 on-sidebar">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center text-center">
            <div class="col-md-7 col-lg-12 col-xl-9">
                <div>

                    <span class="db"><img src="{{ asset('theme/assets/images/logo-light-icon.png')}}" alt="logo" /></span>
                    <span class="db"><img src="{{ asset('theme/assets/images/logo-light-text.png')}}" alt="logo" /></span>

                </div>
                <h2 class="text-white mt-4 fw-light">  <span class="font-weight-medium">{{ __('Admin Login') }}</span>  </h2>
                <p class="op-5 text-white fs-4 mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-xl-9 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100 mt-4 mt-lg-0">
        <div class="col-lg-6 col-xl-3 col-md-7">
          
            
            <div class="card" id="loginform">
                <div class="card-body">

                    @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                    @endif

                    <h2>Welcome to Adminpro</h2>
                    <p class="text-muted fs-4">New Here? <a href="javascript:void(0)" id="to-register">Create an account</a></p>
 
                    <form class="form-horizontal mt-4 pt-4 needs-validation" novalidate method="POST" action="{{ route('admin.auth') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror form-input-bg"  name="email" id="tb-email" value="{{ old('email') }}"  required placeholder="name@example.com" autocomplete="email" autofocus>
                            <label for="tb-email">Email</label>  
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror form-input-bg" id="text-password" placeholder="*****"  name="password" required autocomplete="current-password">
                            <label for="text-password">Password</label>
                           
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="r-me1" required>
                                <label class="form-check-label" for="r-me1">
                                Remember me
                                </label>
                                <div class="invalid-feedback">
                                You must agree before submitting.
                                </div>
                            </div>
                            <div class="ms-auto">
                                <a href="javascript:void(0)" id="to-recover" class="fw-bold">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-stretch button-group mt-4 pt-2">
                            <button type="submit" class="btn btn-info btn-lg px-4">Sign in</button>
                            <a href="javascript:void(0)" class="btn btn-lg btn-light-danger text-danger d-flex align-items-center justify-content-center font-weight-medium"><i class=" fab fa-google btn-lg"></i></a>
                            <a href="javascript:void(0)" class="btn btn-lg btn-light-info text-info d-flex align-items-center justify-content-center font-weight-medium"><i class="fab fa-facebook-f btn-lg"></i></a>
                        </div>
                    </form>
                </div>
            </div>
 
        </div>
    </div>
</div>
@endsection
