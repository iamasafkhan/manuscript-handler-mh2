@extends('layouts.admin')

@section('title', 'Edit_newseventsmanagment')

@section('content')




        <div>

            <div class="card card-body">
                <h4 class="card-title">Edit News</h4>

                <form method="post" action="{{ route('newseventsmanagment.update', $newseventsmanagment->id) }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label>Tittle</label>
                        <input type="text" id="title" name="title" value="{{ $newseventsmanagment->title }}"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <label>Description</label>

                    <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" cols="120"
                        rows="5" class="summernote">{{ $newseventsmanagment->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <br>
                    <button type="submit" class="btn px-4 rounded-pill btn-success">Update</button>

                </form>
            </div>
        </div>
    

        <script>
            $(document).ready(function() {
               $('#summernote').summernote();
           });
           
           </script>

@endsection
