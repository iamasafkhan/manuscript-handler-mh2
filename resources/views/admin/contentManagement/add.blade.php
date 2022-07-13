@extends('layouts.admin')

@section('title', 'Add_content')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif

<div class="card">
    <div class="card-body">
        <h4 class="card-title"><b>Add Content</b></h4>
        <form method="post" action="{{ route('contentmanagement.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="mb-3 row">
                <label for="example-search-input" class="col-md-2 col-form-label">Page Title:</label>
                <div class="col-md-10">
                    <input class="form-control @error('page_title') is-invalid @enderror" type="text" id="page_title" name="page_title">


                    @error('page_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-email-input" class="col-md-2 col-form-label">Page Heading:</label>
                <div class="col-md-10">
                    <input class="form-control @error('page_heading') is-invalid @enderror" type="text" id="page_heading" name="page_heading">

                    @error('page_heading')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>



            <div class="mb-3 row">
                <label class="col-md-2 col-form-label">Page Type:</label>
                <div class="col-md-10">
                    <select class="form-control form-select " name="page_type">
                        <option value="mainmenu" >Main menu</option>
                        <option value="footer1" >Footer 1</option>
                        <option value="footer2" >Footer 2</option>
                        <option value="esubmitdashboard" >eSubmit Dashboard </option>

                    </select>
                    @error('page_type')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="example-tel-input" class="col-md-2 col-form-label">Meta Keywords:</label>
                <div class="col-md-10">
                    <textarea name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" cols="120" rows="5"></textarea>

                    @error('meta_keyword')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-password-input" class="col-md-2 col-form-label">Meta Phrase:</label>
                <div class="col-md-10">
                    <textarea name="meta_phrase" class="form-control @error('meta_phrase') is-invalid @enderror" id="meta_phrase" cols="120" rows="5"></textarea>

                    @error('meta_phrase')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-2 col-form-label">Contents:</label>
                <div class="col-md-10">


                    <textarea id="summernote" name="meta_description" cols="101" rows="10" class="ckeditor @error('meta_phrase') is-invalid @enderror"></textarea>
                    @error('meta_description')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    </div>

    <div class="ms-auto mt-3 mt-md-0">
        <button type="submit" class="btn btn-success font-weight-medium rounded-pill px-4">
            <div class="d-flex align-items-center">

                Submit
            </div>
        </button>
    </div>

<br>

    </form>
</div>







<script>
 $(document).ready(function() {
    $('#summernote').summernote();
});

</script>

    


@endsection