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
            <a href="{{ route('create-companies') }}" class="btn btn-success" style="margin-left: 15px;">Add Companies</a>
        </li>
    </ol>


 



  

        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle" id="companiesID">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>SEO URL</th>
                            <th >Website</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @foreach ($companies as $companies)
                        <tr>
                            <td>{{ $companies->id }}</td>
                            <td>

                            @if (!empty($product->companyLogo))
                            <img src="{{ asset('storage/companyLogo/' . $companies->companyLogo) }}" style="width: 100%">
                        @endif

                    </td>


                            <td>{{ $companies->companyName }}</td>
                            <td>{{ $companies->companySEOURL }}</td>

                            <td>{{ $companies->companyWebsite }}</td>
                            <td>{{ $companies->companyDescription }}</td>


                            <td>
                                <a href="{{ route('edit-companies', $companies->id) }}" class="fas fa-pen">Edit</a>



                                <form action="{{ route('delete-companies', $companies->id) }}" method="post">

                                    @csrf

                                    <button onclick="return window.confirm('Are You Sure to Delete This Company?');"
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
            $('#companiesID').DataTable();
        });
    </script>



@endsection
