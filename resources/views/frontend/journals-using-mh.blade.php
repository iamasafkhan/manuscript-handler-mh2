@extends('layouts.base')
@section('title', 'Journals Using Mh')
@section('content')

     <section>
        <div class="container">
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="col-md-12">
                    <h4><b>Journals Using MH</b></h4>
                </div>
                <div class="col-md-12">
                    <table id="journal" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.no</th>
                                <th>Journal Name</th>
                                <th>Submit Online</th>
                                <th>Journal Home Page</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($journals as $journal)
                                <tr>
                                    <td>{{ $journal->id }}</td>
                                    <td>{{ $journal->name }}</td>
                                    <td>
                                        <a href="{{ route('esubmit-login', [$journal->companyName, $journal->seo]) }}">Submit
                                            Online</a>
                                    </td>
                                    {{-- ['company'=>$journal->companyName, 'seo'=>$journal->seo] --}}
                                     <td style="border-bottom:#CCC solid 1px;">
                                        <a href="#">View Home Page</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div> 
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#journal').DataTable();
        }); 
    </script>
@endsection
