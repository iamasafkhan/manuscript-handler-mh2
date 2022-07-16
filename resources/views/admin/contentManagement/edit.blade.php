@extends('layouts.admin')

@section('title', 'Edit_content')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Edit Content</b></h4>
            <form method="post" action="{{ route('contentmanagement.update', $contentmanagement->id) }}"
                enctype="multipart/form-data">
               
                @csrf

                <div class="mb-3 row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Page Title:</label>
                    <div class="col-md-10">
                        <input class="form-control @error('page_title') is-invalid @enderror" type="text" id="page_title"
                            name="page_title" value="{{ $contentmanagement->page_title }}">


                        @error('page_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Page Heading:</label>
                    <div class="col-md-10">
                        <input class="form-control @error('page_heading') is-invalid @enderror" type="text"
                            id="page_heading" name="page_heading" value="{{ $contentmanagement->page_heading }}">

                        @error('page_heading')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Page Type:</label>
                    <div class="col-md-10">
                        <select class="form-control form-select " name="page_type"
                            value="{{ $contentmanagement->page_menu }}">
                            <option>Main menu</option>
                            <option>Footer 1</option>
                            <option>Footer 2</option>

                        </select>
                        @error('page_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-tel-input" class="col-md-2 col-form-label">Meta Keywords:</label>
                    <div class="col-md-10">
                        <textarea name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword"
                            cols="120" rows="5">{{ $contentmanagement->meta_keyword }}</textarea>

                        @error('meta_keyword')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Meta Phrase:</label>
                    <div class="col-md-10">
                        <textarea name="meta_phrase" class="form-control @error('meta_phrase') is-invalid @enderror" id="meta_phrase" cols="120"
                            rows="5">{{ $contentmanagement->meta_phrase }}</textarea>

                        @error('meta_phrase')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Contents:</label>
                    <div class="col-md-10">

                        <textarea id="summernote" name="meta_description" cols="50" rows="15"
                            class="ckeditor @error('meta_description') is-invalid @enderror">

                    {{ $contentmanagement->meta_description }}  </textarea>


                        @error('meta_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
        </div>

        <div class="ms-auto mt-3 mt-md-0">
            <button type="submit" class="btn btn-success font-weight-medium rounded-pill px-4">
                <div class="d-flex align-items-center">
                    Update
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
