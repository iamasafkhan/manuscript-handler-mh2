@extends('layouts.admin')

@section('title', 'newseventsmanagment')

@section('content')






        <div class="card card-body">
            <h4 class="card-title">Add News</h4>

            <form  method="post"  action="{{ route('newseventsmanagment.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Tittle</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <label>Description</label>

                <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror"  cols="120" rows="10"  placeholder="description"></textarea>
                @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

            </form>
        </div>


        <script>
            $(document).ready(function() {
               $('#summernote').summernote();
           });
           
           </script>

@endsection