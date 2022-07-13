@extends('layouts.admin')

@section('title', 'checklisttext')

@section('content')


<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Add Abiotic and Biotic Stress Journal Contents</b></h4>
            <form method="post" action="{{route('store-checklisttext')}}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="mb-3 row">
                    <label for="example-number-input" class="col-md-2 col-form-label">Content:</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="120" rows="5" class="summernote">{{ old('description') }}</textarea>
                        @error('description')
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
                <input type="hidden" name="journalid" value="{{ $journals->id }}">
            </form>
        </div>
    </div>
</div>



@endsection