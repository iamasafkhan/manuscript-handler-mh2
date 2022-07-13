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
                    <h3>Manuscript Handler - Author's Panel</h3>

                    <p>Please include the names and affiliations of all authors of this manuscript and mark the
                        corresponding author by selecting the “Corresponding Author” button.
                        You can add as many authors as your wish by clicking on the “Add Author” button. Please make sure to
                        fill the correct email address to receive submission confirmatory email and to receive future
                        correspondence.</p>

                    <p>After completion of all required fields, click on "Update" to save the page or "Update & Next" to
                        proceed to next page and save the current.
                        Click on “Previous” to go back to previous page. If there is nothing to change, click on "Skip".</p>

                </div>
            </div>



            @if (session('message'))
                <div class="alert alert-succes">
                    {{ session('message') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2 id="heading">Sign Up Your User Account</h2>
                            <p>Fill all form field to go to next step</p>

                            <div id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li id="author_checklist"
                                        class="{{ Request::path() === 'newsubmission' ? 'active' : '' }}"><a
                                            href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}"><strong>Author's
                                                Checklist</strong></a></li>
                                    <li id="type_title_abstract"
                                        class="{{ Request::path() === 'title-type-abstract' ? 'active' : '' }}"><a
                                            href="{{ route('title-type-abstract', [$company->companySEOURL, $journal->seo]) }}"><strong>Type,
                                                Title, &amp; Abstract</strong></a>
                                    </li>
                                    <li id="suggested_unsuggested_reviewer">
                                        <a
                                            href="{{ route('reviewer', [$company->companySEOURL, $journal->seo]) }}"><strong>Reviewers</strong></a>
                                    </li>
                                    <li id="authors_institution"
                                        class="{{ Request::path() === 'author-institution' ? 'active' : '' }}"><a
                                            href="{{ route('author-institution', [$company->companySEOURL, $journal->seo]) }}"><strong>Authors
                                                &amp; Institutions</strong></a></li>
                                    <li id="file_upload" class="{{ Request::path() === 'file-upload' ? 'active' : '' }}">
                                        <a href="{{ route('file-upload', [$company->companySEOURL, $journal->seo]) }}"><strong>File
                                                Upload</strong></a>
                                    </li>
                                    <li id="proof_submit"
                                        class="{{ Request::path() === 'proof-submit' ? 'active' : '' }}"><a
                                            href="{{ route('proof-submit', [$company->companySEOURL, $journal->seo]) }}"><strong>Proof
                                                &amp; Submit</strong></a></li>
                                    <li id="confirm"><a
                                            href="{{ route('finish-new-manuscript', [$company->companySEOURL, $journal->seo]) }}"><strong>Finish</strong></a>
                                    </li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- fieldsets -->

                                {{-- Step 4: File Upload --}}

                                <fieldset>
                                    @if ($fileUploaded)

                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">File Upload</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 4 - 5</h2>
                                                </div>
                                            </div>
                                            <div class="form-card">
                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="card shadow-lg border-0 rounded-lg">
                                                            <div class="card-title">
                                                                <h3 class="text-center bg-info text-success">File Upload
                                                                </h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="{{ route('submit-file-upload') }}"
                                                                    enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="journalID"
                                                                        value="{{ $journal->id }}">
                                                                    <input type="hidden" name="companyID"
                                                                        value="{{ $company->id }}">
                                                                    <div class="row">
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>File Name</span>

                                                                        </div>
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>File Designation</span>


                                                                        </div>
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>Image Color</span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input class="form-control" id="name"
                                                                                    name="uploadFilesFile" type="file"
                                                                                    value="{{ $fileUploaded->fileName }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <select class="form-select"
                                                                                    aria-label="Default select example"
                                                                                    name="fileDisignation">
                                                                                    <option selected>Open this select menu
                                                                                    </option>
                                                                                    @foreach ($filedesignation as $file)
                                                                                        <option
                                                                                            value="{{ $file->id }}">
                                                                                            {{ $file->title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <select class="form-select"
                                                                                    aria-label="Default select example"
                                                                                    name="imageColor">
                                                                                    <option selected>select color</option>
                                                                                    <option value="Colored">Colored</option>
                                                                                    <option value="Black & White">Black &
                                                                                        White</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                    <div class="row mt-3">
                                                                        <div class="col-md-12 d-flex justify-content-end">
                                                                            <input type="submit" name="btnUpload"
                                                                                class="btn btn-primary me-3"
                                                                                value="Upload File">

                                                                            <a href="{{ route('proof-submit', [$company->companySEOURL, $journal->seo]) }}"
                                                                                name="next" class="btn btn-success next">Go To
                                                                                Next</a>
                                                                        </div>
                                                                    </div>


                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-card">
                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="card shadow-lg border-0 rounded-lg">
                                                            <div class="card-title">
                                                                <h3 class="text-center bg-info text-success">File Upload
                                                                </h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table" id="table_authors">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Order #</th>
                                                                            <th>File Name</th>
                                                                            <th>File Designation</th>
                                                                            <th>Date</th>
                                                                            <th>Option</th>

                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($uploadedFiles as $file)
                                                                            <tr>
                                                                                <td>{{ $file->id }}</td>
                                                                                <td>{{ $file->fileName }}</td>
                                                                                <td>{{ $file->fileDesignation }}</td>
                                                                                <td>{{ $file->created_at }}</td>
                                                                                <td>
                                                                                    <form method="POST"
                                                                                        action="{{ route('delete-file', [$company->companySEOURL, $journal->seo, $file->id]) }}">
                                                                                        @csrf
                                                                                        <button type="submit"
                                                                                            class="btn btn-outline-danger btn-flat show-alert-delete-box btn-sm bi bi-x-circle"
                                                                                            data-toggle="tooltip"
                                                                                            title='Delete'></button>
                                                                                    </form>
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
                                    @else
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">File Upload</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 5 - 6</h2>
                                                </div>
                                            </div>
                                            <div class="form-card">
                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="card shadow-lg border-0 rounded-lg">
                                                            <div class="card-title">
                                                                <h3 class="text-center bg-info text-success">File Upload
                                                                </h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="{{ route('submit-file-upload') }}"
                                                                    enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="journalID"
                                                                        value="{{ $journal->id }}">
                                                                    <input type="hidden" name="companyID"
                                                                        value="{{ $company->id }}">
                                                                    <div class="row">
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>File Name</span>

                                                                        </div>
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>File Designation</span>


                                                                        </div>
                                                                        <div class="col-md-4"
                                                                            style="background: rgb(216, 210, 210)">
                                                                            <span>Image Color</span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input class="form-control" id="name"
                                                                                    name="uploadFilesFile" type="file"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <select class="form-select"
                                                                                    aria-label="Default select example"
                                                                                    name="fileDisignation">
                                                                                    <option selected>Open this select menu
                                                                                    </option>
                                                                                    @foreach ($filedesignation as $file)
                                                                                        <option
                                                                                            value="{{ $file->id }}">
                                                                                            {{ $file->title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <select class="form-select"
                                                                                    aria-label="Default select example"
                                                                                    name="imageColor">
                                                                                    <option selected>select color</option>
                                                                                    <option value="Colored">Colored
                                                                                    </option>
                                                                                    <option value="Black & White">Black &
                                                                                        White</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @if ($fileUploaded)
                                                                        <a href="{{ route('proof-submit', [$company->companySEOURL, $journal->seo]) }}"
                                                                            name="next" class="next action-button">Go
                                                                            To
                                                                            Next</a>
                                                                    @endif

                                                                    <input type="submit" name="btnUpload"
                                                                        class="btn btn-sm btn-primary"
                                                                        value="Upload File">

                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-card">
                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="card shadow-lg border-0 rounded-lg">
                                                            <div class="card-title">
                                                                <h3 class="text-center bg-info text-success">File Upload
                                                                </h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table" id="table_authors">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Order #</th>
                                                                            <th>File Name</th>
                                                                            <th>File Designation</th>
                                                                            <th>Date</th>
                                                                            <th>Option</th>

                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($uploadedFiles as $file)
                                                                            <tr>
                                                                                <td>{{ $file->id }}</td>
                                                                                <td>{{ $file->fileName }}</td>
                                                                                <td>{{ $file->fileDisignation }}</td>
                                                                                <td>{{ $file->created_at }}</td>
                                                                                <td>
                                                                                    <form method="POST" action="{{ route('delete-file', [$company->companySEOURL, $journal->seo, $file->id]) }}">
                                                                                        @csrf
                                                                                        <button type="submit" class="btn btn-outline-danger btn-flat show-alert-delete-box btn-sm bi bi-x-circle" data-toggle="tooltip" title='Delete'></button>
                                                                                    </form>
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

                                    @endif


                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            // var steps = $("fieldset").length;
            //alert(steps);
            var steps = 7;
            setProgressBar(5);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })


            @if (Session::has('message'))
                toastr.success('{{ Session::get('message') }}', 'Success');
            @endif

        });
    </script>
@endsection
