@extends('layouts.admin')

@section('title', 'Edit_areas_interest')

@section('content')


    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div>
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Edit Areas of interest</h4>
            </div>
            <form method="post" action="{{ route('areasinterestmanagment-update',$areas_of_interest->id) }}" enctype="multipart/form-data">
               
               @csrf

                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Journal Name</label>
                        <div class="col-sm-7">

                            <select class="form-control @error('user_type') is-invalid @enderror" name="journal" id="journal">
  
                                @foreach ($journals as $journals)
                                    <tr>
                                       
                                        <option>{{$journals->name}}</option>
                                        
                                    </tr>
                                @endforeach

                            </select>

                            @error('journal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Select Parent Interest</label>
                        <div class="col-sm-7">

                            <select class="form-control @error('parent_interest') is-invalid @enderror" name="parent_interest" id="parent_interest">
  
                                @foreach ($areainterest as $areainterest)
                                    <tr>
                                       
                                        <option>{{$areainterest->title}}</option>
                             
                                    </tr>
                                @endforeach

                            </select>

                            @error('parent_interest')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Title">

                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="text-end" style="padding-right: 150px">
                        <button type="submit"
                            class="btn btn-success rounded-pill px-4 waves-effect waves-light">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
