@extends('layouts.admin')

@section('title', 'resource_center')

@section('content')




    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('resourcecenter-create') }}" class="btn btn-success" style="margin-left: 15px;">Add
             Resource</a>
        </li>
    </ol>


    <div class="row">


        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle" id="demorequestID">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>User Type</th>
                            <th>PDF File</th>
                            <th>Action</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @foreach ($resources_center as $resources_center)
                        <tr>
                            <td>{{ $resources_center->id }}</td>

                            <td>{{ $resources_center->user_type }}</td>

                            <td>{{ $resources_center->pdffile }}</td>

                            <td>
                                <a href="{{ route('resourcecenter-download', $resources_center->pdffile) }}" class="fas fa-pen">Download</a>
                            </td>

                            
                        <td>
                            <a href="{{ route('resourcecenter-edit', $resources_center->id) }}" class="fas fa-pen">Edit</a>



                            <form action="{{ route('resourcecenter-destroy', $resources_center->id) }}" method="post">
                                @csrf
                           
                              <button onclick="return window.confirm('Are You Sure to Delete This Resource?');" type="submit" class="btn btn-outline-danger">Delete</button>

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
            $('#demorequestID').DataTable();
        });
    </script> 

@endsection
