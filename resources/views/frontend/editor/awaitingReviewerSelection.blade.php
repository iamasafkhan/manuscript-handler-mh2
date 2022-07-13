@extends('layouts.list')
@section('title', 'Editor Panel')
@section('content')

<br><br><br>

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
                    @foreach ($waitingReviewers  as $waitingReviewer)
                    <tr>
                        <td>{{ $waitingReviewer->id }}</td>
                        <td>{{ $waitingReviewer->orderNumber  }}</td>
                        <td>{{ $waitingReviewer->journalName}}</td>
                        
    
                        <td>{{ $waitingReviewer->ManuscriptTitle}}</td>
               
                        <td>{{ $waitingReviewer->FirstName}}</td>
                        <td>{{ $waitingReviewer->created_at }}</td>
                        <th class="text-center" ><i  class="bi bi-download" ></i></th>
                        
                        <td>
                           <a href="{{ route('awaiting-reviewer-selection-details', [$company->companySEOURL, $journal->seo, $waitingReviewer->orderNumber]) }}"><i class="bi bi-ticket-detailed"></i></a>
                           
                           <a href=""><i class="bi bi-file-earmark-pdf-fill"></i></a>
                        </td>
                       
                    </tr>
                    @endforeach
           

                </tbody>


            </table>
        </div>
    </div>


</section>





@endsection

