@extends('layouts.admin')

@section('title', 'filedesignation')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Add file designation to ( Abiotic and Biotic Stress Journal)</b></h4>
            <form method="post" action="{{route('store-filedesignation')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-5">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title">

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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Manage file designation of ( Abiotic and Biotic Stress Journal)</h4>
        </div>
        <div class="table-responsive">
            <table class="table customize-table mb-0 v-middle" id="fileID" >
                <thead class="table-dark"  >
                    <tr>
                        <th class="border-bottom border-top">S.No</th>
                        <th class="border-bottom border-top">Title</th>
                        <th class="border-bottom border-top">Entry Date</th>
                        <th class="border-bottom border-top">Options</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($filedesignation as $filedesignation )
                    <tr>
                        <td>{{$filedesignation->id}}</td>

                        <td>{{$filedesignation->title}}</td>
                        <td>{{$filedesignation->created_at}}</td>


                        <td>
                            <a href="{{ route('edit-filedesignation', $filedesignation->id) }}" class="fas fa-pen">Edit</a>
                            <form action="{{ route('delete-filedesignation', $filedesignation->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



<script>
    $(document).ready(function() {
        $('#fileID').DataTable();
    });
</script>



@endsection