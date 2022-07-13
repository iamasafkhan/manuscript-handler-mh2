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
                    @foreach ($authorchecklist  as $manuscript_submitteds)
                    <tr>
                        <td>{{ $manuscript_submitteds->id }}</td>
                        <td>{{ $manuscript_submitteds->orderNumber  }}</td>
                        <td>{{ $manuscript_submitteds->journalName}}</td>
                        
    
                        <td>{{ $manuscript_submitteds->ManuscriptTitle}}</td>
               
                        <td>{{ $manuscript_submitteds->FirstName}}</td>
                        <td>{{ $manuscript_submitteds->created_at }}</td>
                        <th class="text-center" ><i  class="bi bi-download" ></i></th>
                        
                        <th><i class="bi bi-file-pdf"></i><i class="bi bi-file-pdf" style="color: red" ></i>
                            </th>
                        
                    </tr>
                    @endforeach
           

                </tbody>


            </table>
        </div>
    </div>


</section>





@endsection

