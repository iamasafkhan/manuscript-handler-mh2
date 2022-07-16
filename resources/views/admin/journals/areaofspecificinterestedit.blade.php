@extends('layouts.admin')

@section('title', 'areaofspecificinterest')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Edit area of specific interest to (Abiotic and Biotic Stress Journal)</b></h4>
            <form method="post" action="{{route('update-areaofspecificinterest',$areaofspecificinterest->id)}}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mb-3 row">
                    <label for="title" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-5">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{$areaofspecificinterest->title}}">
                        @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-4" style="margin: 30px;">
                    <div class="d-md-flex align-items-center mt-3">

                        <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class="btn btn-success font-weight-medium rounded-pill px-4">
                                <div class="d-flex align-items-center">
                                    Update
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection