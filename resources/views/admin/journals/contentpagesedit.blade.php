@extends('layouts.admin')

@section('title', 'Edit_content')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Edit Journal Content Page to (Abiotic and Biotic Stress Journal )</b></h4>
            <form method="post" action="{{ route('content-update',  $pagecontent->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Page Menu</label>
                    <div class="col-md-10">
                        <input class="form-control @error('page_tab') is-invalid @enderror" type="text" id="page_tab"  value="{{$pagecontent->page_tab}}" name="page_tab">
                        @error('page_tab')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Page Title:</label>
                    <div class="col-md-10">
                        <input class="form-control @error('page_title') is-invalid @enderror" type="text" id="page_title" value="{{$pagecontent->page_title}}" name="page_title">
                        @error('page_title')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Page Heading:</label>
                    <div class="col-md-10">
                        <input value="{{$pagecontent->page_heading}}" class="form-control @error('page_heading') is-invalid @enderror" type="text" id="page_heading" name="page_heading">
                        @error('page_heading')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Page URL:</label>
                    <div class="col-md-10">
                        <input  value="{{$pagecontent->page_url}}" class="form-control @error('page_url') is-invalid @enderror" type="text" value="" id="page_url" name="page_url">
                        @error('page_url')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-tel-input" class="col-md-2 col-form-label">Meta Keywords:</label>
                    <div class="col-md-10">
                        <textarea  name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" cols="120" rows="5" class="summernote">{{ $pagecontent->meta_keyword}}</textarea>
                        @error('meta_keyword')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Meta Phrase:</label>
                    <div class="col-md-10">
                        <textarea name="meta_phrase" class="form-control @error('meta_phrase') is-invalid @enderror" id="meta_phrase" cols="120" rows="5" class="summernote">{{ $pagecontent->meta_phrase}}</textarea>
                        @error('meta_phrase')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-number-input" class="col-md-2 col-form-label">Contents:</label>
                    <div class="col-md-10">
                        <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" cols="120" rows="5" class="summernote">{{ $pagecontent->meta_description}}</textarea>
                        @error('meta_description')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
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