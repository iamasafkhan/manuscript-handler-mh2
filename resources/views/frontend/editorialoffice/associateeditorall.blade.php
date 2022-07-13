@extends('layouts.list')
@section('title', 'EditorialOffice Panel')
@section('content')

<br><br><br>

@include('frontend.editorialoffice.search')



<section class="container">
    
    <div class="card">
        <div class="card-header bg-primary text-white">Submitted Manuscripts</div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Manuscript ID</th>
                        <th>Journal Name</th>
                        <th>Manuscript Title</th>
                     
                        <th>Submitting Author</th>
                        <th>Date Submitted</th>
                        <th>Download</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>




                    
                </tbody>


            </table>
        </div>
    </div>


</section>

@endsection
