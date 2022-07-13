@extends('layouts.admin')

@section('title', 'demorequest')

@section('content')



    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif




    <div class="row">




        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle" id="demorequestID" >
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Publication</th>
                            <th>Contact Details</th>
                            <th>Means of demo</th>
                            <th>Comments</th>
                            <th>Preferred Date</th>
                            <th>Entry Date</th>

                        </tr>
                    </thead>
                    @foreach ($demorequests as $demorequests)
                        <tr>
                            <td>{{ $demorequests->id }}</td>

                            <td>{{ $demorequests->yourName }}</td>

                            <td>{{ $demorequests->publication }}</td>


                            <td>{{ $demorequests->emailAddress }}</td>

                            <td>{{ $demorequests->meansofdemo }}</td>

                            <td>{{ $demorequests->comments }}</td>
                            
                            <td>{{ $demorequests->preferredDates }}</td>

                            <td>{{ $demorequests->created_at }}</td>



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
