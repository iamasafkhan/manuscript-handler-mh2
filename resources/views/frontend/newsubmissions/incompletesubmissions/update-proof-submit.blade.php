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



            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2 id="heading">Sign Up Your User Account</h2>
                            <p>Fill all form field to go to next step</p>

                            {{-- <div id="msform"> --}}

                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li id="author_checklist" class=""><a
                                        href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}"><strong>Author's
                                            Checklist</strong></a></li>
                                <li id="type_title_abstract" class=""><a
                                        href="{{ route('edit-titleTypeAbstract', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Type,
                                            Title, &amp; Abstract</strong></a>
                                </li>
                                <li id="suggested_unsuggested_reviewer">
                                    <a href="{{ route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Reviewers</strong></a>
                               </li>
                                <li id="authors_institution" class=""><a
                                        href="{{ route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Authors
                                            &amp; Institutions</strong></a></li>
                                <li id="file_upload" class=""><a
                                        href="{{ route('edit-file-upload', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>File
                                            Upload</strong></a></li>
                                <li id="proof_submit"><a
                                        href="{{ route('edit-proof-submit', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Proof
                                            &amp; Submit</strong></a></li>
                                <li id="confirm"><a
                                        href="{{ route('finish-incomplete-manuscript', [$company->companySEOURL, $journal->seo]) }}"><strong>Finish</strong></a>
                                </li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <br>
                            <!-- fieldsets -->
                            {{-- Step 5: Proof & Submit --}}

                            <form action="{{ route('update-proof-submit', $orderNumber) }}" method="post">
                                @csrf
                                <input type="hidden" name="journalID" value="{{ $journal->id }}">
                                 <input type="hidden" name="companyID" value="{{ $company->id }}">
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <div class="card shadow-lg border-0 rounded-lg">
                                            {{-- class="text-start p-2 bg-info text-success" --}}
                                            <div
                                                class="px-2 bg-info text-success card-title d-flex justify-content-between align-items-center">
                                                <h3>
                                                    Type Title & Abstract
                                                </h3>
                                                <a
                                                    href="{{ route('title-type-abstract', [$company->companySEOURL, $journal->seo]) }}">Edit</a>
                                            </div>
                                            <div class="card-body">

                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1">
                                                                Type of manuscript</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>{{ $typeTitleAbstract->typeOfManuscript }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1" >Areas of
                                                                specific
                                                                interest</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>{{ $typeTitleAbstract->areaOfSpecificInterest }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1"
                                                                for="arrival-airport">Title</label>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>{{ $typeTitleAbstract->manuscriptTitle }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="arrival-airport">Running
                                                                title</label>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>{{ $typeTitleAbstract->runningTitle }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="arrival-airport">
                                                                Abstract </label>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>{!! $typeTitleAbstract->manuscriptAbstract !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="room-type">Keywords</label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-9 border">
                                                        @foreach ($keywords as $keyword)
                                                        <div class="form-group">
                                                            <span>{{ $keyword->keywords }}</span>
                                                        </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1"
                                                                for="room-type">Acknowledgements</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-9 border">
                                                        <div class="form-group">
                                                            <span>
                                                                {{ $typeTitleAbstract->manuscriptAcknowledgement }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="arrival-airport">Suggested
                                                                reviewers</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-3"
                                                                style="background: rgb(226, 221, 221)">
                                                                <span>Name</span>

                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(219, 215, 215)">
                                                                <span>Email</span>

                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(226, 223, 223)">
                                                                <span>Fields of Expertise</span>


                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(228, 225, 225)">
                                                                <span>Affiliation</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($suggestedrevs as $suggestedrev)
                                                    <div class="row mt-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <span>{{ $suggestedrev->recommendingName }}</span>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $suggestedrev->recommendingEmail }}</span>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $suggestedrev->recommendingExpter }}</span>


                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $suggestedrev->recommendingAffiliation }}</span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="small"
                                                                for="arrival-airport">Non-preferred
                                                                reviewers</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">

                                                            <div class="col-md-3"
                                                                style="background: rgb(209, 208, 208)">
                                                                <span>Name</span>

                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(216, 211, 211)">
                                                                <span>Email</span>


                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(214, 210, 210)">
                                                                <span>Fields of Expertise</span>


                                                            </div>
                                                            <div class="col-md-3"
                                                                style="background: rgb(212, 208, 208)">
                                                                <span>Affiliation</span>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($unsuggestedrevs as $unsuggestedrev)
                                                    <div class="row mt-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <span>{{ $unsuggestedrev->recommendingName }}</span>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $unsuggestedrev->recommendingEmail }}</span>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $unsuggestedrev->recommendingExpter }}</span>


                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span>{{ $unsuggestedrev->recommendingAffiliation }}</span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card shadow-lg border-0 rounded-lg" id="choose-address-table">
                                                    <div
                                                        class="px-2 bg-info text-success card-title d-flex justify-content-between align-items-center">
                                                        <h4>
                                                            Authors and Institutions
                                                        </h4>
                                                        <a
                                                            href="{{ route('author-institution', [$company->companySEOURL, $journal->seo]) }}">Edit</a>
                                                    </div>
                                                    <div class="card-body">

                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Title</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Email Address</th>
                                                                    <th>Affiliation</th>
                                                                    <th>Country</th>
                                                                    <th>Corresponding Author</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($authorInstitutions as $institution)
                                                                    <tr>
                                                                        <td>{{ $institution->id }}</td>
                                                                        <td>{{ $institution->authTitle }}</td>
                                                                        <td>{{ $institution->authFirstName }}</td>
                                                                        <td>{{ $institution->authLastName }}</td>
                                                                        <td>{{ $institution->authEmailAddress }}</td>
                                                                        <td>{{ $institution->authAffiliation }}</td>
                                                                        <td>{{ $institution->authCountry }}</td>
                                                                        <td>{{ $institution->authCorresponding }}</td>
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card shadow-lg border-0 rounded-lg" id="choose-address-table">
                                                    <div
                                                        class="px-2 bg-info text-success card-title d-flex justify-content-between">
                                                        <h4>
                                                            File Upload
                                                        </h4>
                                                        <a href="{{ route('file-upload', [$company->companySEOURL, $journal->seo]) }}"
                                                            class="align-self-center">Edit</a>
                                                    </div>
                                                    <div class="card-body">

                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#Order</th>
                                                                    <th>File Name</th>
                                                                    <th>File Designation</th>
                                                                    <th>Date</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($uploadedFiles as $file)
                                                                    <tr>
                                                                        <td>{{ $file->id }}</td>
                                                                        <td>{{ $file->fileName }}</td>
                                                                        <td>{{ $file->fileDisignation }}</td>
                                                                        <td>{{ $file->created_at }}</td>

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
                                <input type="button" name="generat_pdf" class="btn btn-danger mt-5" value="Generat PDF" title="View Code" data-bs-toggle="modal" data-bs-target="#view-create-users-modal" />
                                @if ($author)

                                 <input type="submit" name="next" class="btn btn-primary mt-5" value="Submit" />
                                @endif

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->

        <div id="view-create-users-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manuscript PDF generated file</h5>
                       <a href="{{ route('marge-pdf-file',[$company->companySEOURL, $journal->seo, $orderNumber]) }}" class="btn btn-primary" target="blank" >View/Download pdf</a>
                      </div>
                    <div style="padding: 30px;">
                        {{-- <h4 class="text-center"><b>Manuscript PDF generated file</b></h4> --}}

                            <div>
                                <p>
                                    Please click on the View/Download PDF button to view the cover letter of your manuscript. If the cover letter is correct, click on the “Accept” button to proceed with submission. If the PDF file has errors, click on the "Close" button and go back to your submission page to correct the errors. At this stage, you will be unable to see your uploaded files printed in this PDF, however, the editorial office will generate a full PDF containing your all files and upload into you Author Panel before sending the manuscript to Editor of the journal.
                                </p>
                            </div>


                            <div class="d-flex align-items-stretch button-group">
                                <a href="{{ route('update-pdf-accept',[$company->companySEOURL, $journal->seo, $orderNumber]) }}" class="btn btn-dark btn-lg px-4">Accept</a>
                                <a href="javascript:void(0)" id="to-login2" class="btn btn-lg btn-light-secondary text-secondary font-weight-medium" data-bs-dismiss="modal">Close</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            // var steps = $("fieldset").length;
            //alert(steps);
            var steps = 7;
            setProgressBar(6);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })




        });
    </script>
@endsection
