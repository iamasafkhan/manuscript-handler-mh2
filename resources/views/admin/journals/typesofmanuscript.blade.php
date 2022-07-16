@extends('layouts.admin')

@section('title', 'Typesofmanuscript')

@section('content')


@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Add Types of manusctipt to ( Abiotic and Biotic Stress Journal)</b></h4>
            <form method="post" action="{{ route('store-typesofmanuscript') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-md-3 col-form-label">Types of manuscript</label>
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
        <div class="card-body"> Manage Types of manusctipt of ( Abiotic and Biotic Stress Journal)</h4>
        </div>
        <div class="table-responsive">
            <table class="table customize-table mb-0 v-middle" id="typeID" >
                <thead class="table-dark">
                    <tr>
                        <th class="border-bottom border-top">S.No</th>

                        <th class="border-bottom border-top">Types of manusctipt</th>
                        <th class="border-bottom border-top">Entry Date</th>
                        <th class="border-bottom border-top">Options</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($typesofmanuscript as $typesofmanuscript )
                    <tr>
                        <td>{{$typesofmanuscript->id}}</td>

                        <td>{{$typesofmanuscript->title}}</td>

                        <td>{{$typesofmanuscript->created_at}}</td>

                        <td>
                            <a href="{{ route('edit-typesofmanuscript', $typesofmanuscript->id) }}" class="fas fa-pen">Edit</a>

                            <form action="{{ route('delete-typesofmanuscript', $typesofmanuscript->id) }}" method="POST">
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

</div>




<script>
    $(document).ready(function() {
        $('#typeID').DataTable();
    });
</script>


@endsection