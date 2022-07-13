@extends('layouts.list')
@section('title', 'Authors Panel')
@section('content')


    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            <h2>Inner Page</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="services" class="services">

        <div class="container aos-init aos-animate" data-aos="fade-up">

            <header class="section-header">

            </header>

            <div class="row">
                <div class="col-md-12">
                    <h3> Author's Panel </h3>
                    <p> To proceed with the submission of a new manuscript, click on the “Submit New Manuscript” section.
                        All incomplete submissions will be placed in the “Incomplete Submissions”. If all the required
                        information is completed, a final PDF has to be generated for approval by the author. This
                        manuscript will be under “Waiting for Author’s Approval”. Once approved, the article will be
                        submitted and will be moved to “Submissions Being Processed” section. Please note that for a
                        successful submitted manuscript,
                        that manuscript must be under “Submissions Being Processed” and you must have received a
                        confirmatory email on your provided email address.

                        Once the Editor makes a decision, the manuscript will move to “Submissions with Decision” and it
                        will be notified to the author.</p>

                    <p>Authors can revise the manuscripts with major or minor revision, corresponding to “New Submissions”
                        information. The final revised and submitted manuscripts must be under “Revisions Being Processed”
                        and you must have received confirmatory emails.</p>

                </div>
            </div>



            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="card shadow-lg border-0 rounded-lg" id="choose-address-table">
                                        <div class="px-2 bg-info text-success card-title d-flex justify-content-between align-items-center">
                                            <h4>
                                                Incomplete Submissions
                                            </h4>

                                        </div>

                                        <div class="card-body">
                                            <table class="table" id="table_authors">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Manuscript ID</th>
                                                        <th>Journal Name</th>
                                                        <th>Manuscript Title</th>
                                                        <th>Submitting Author</th>
                                                        <th>Date Submitted</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($incomplete as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->orderNumber }}</td>
                                                            <td>{{ $item->journalName }}</td>
                                                            <td>{{ $item->ManuscriptTitle }}</td>
                                                            <td>{{ $item->auth_FullName }}</td>
                                                            <td>{{  date('d-M-Y', strtotime($item->statusDated)) }}</td>
                                                            <td>{{ $item->submitStatus }}</td>
                                                            <td>
                                                                 <a class="btn btn-sm btn-info" href="{{ route('edit-titleTypeAbstract', [$company->companySEOURL, $seo->seo, $item->orderNumber]) }}"><i class="bi bi-pencil-square"></i></a>

                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>
@endsection
