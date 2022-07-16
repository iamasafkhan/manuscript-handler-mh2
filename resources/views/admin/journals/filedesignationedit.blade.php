
@extends('layouts.admin')

@section('title', 'fileDesignationedit_edit')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title"><b>Edit file designation to (Abiotic and Biotic Stress Journal)exif_thumbnail</b></h4>
        <form method="post" action="{{ route('update-filedesignation',  $file_designation->id) }}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3 row">
                    <label for="title" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-5">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{$file_designation->title}}" >

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



@endsection