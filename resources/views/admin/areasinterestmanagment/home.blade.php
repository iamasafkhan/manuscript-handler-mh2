@extends('layouts.admin')

@section('title', 'companies')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('areasinterestmanagment-create') }}" class="btn btn-success" style="margin-left: 15px;">Add Areas Interest</a>
        </li>
    </ol>

        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle" id="areaID">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Parent</th>
                            <th>Title</th>
                            <th>Seo url</th>
                            <th>Options</th>
                        </tr>
                    </thead>
 



                    @foreach ($areainterest as $areainterest)
                    <tr>
                        <td>{{ $areainterest->id }}</td>

                        <td>{{ $areainterest->parentID }}</td>

                        <td>{{ $areainterest->title }}</td>

                        <td>{{ $areainterest->seo_url }}</td>
                        <td>
               
                            <a href="{{ route('areasinterestmanagment-edit', $areainterest->id) }}" class="fas fa-pen">Edit</a>

                            <form action="{{ route('areasinterestmanagment-destroy', $areainterest->id) }}" method="post">

                                @csrf

                                <button onclick="return window.confirm('Are You Sure to Delete This Area Interest?');"
                                    type="submit" class="btn btn-outline-danger">Delete</button>

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
            $('#areaID').DataTable();
        });
    </script>



@endsection
