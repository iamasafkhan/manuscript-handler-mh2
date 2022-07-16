
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <div class="main-menu">
                                    <nav class="main-nav">
                                        <ul>

                                       
                           
                                        


                                    
                                     
                                            <li>
                                                <a href="{{ route('admin.logout')}}">logout</a>
                                            </li>
                                         




                                        </ul>
                                    </nav>
                                </div>
           
                </div>
            </div>
        </div>
    </div>
</div>









@endsection
