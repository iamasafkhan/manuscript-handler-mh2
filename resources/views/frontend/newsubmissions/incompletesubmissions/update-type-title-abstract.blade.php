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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2 id="heading">Sign Up Your User Account</h2>
                            <p>Fill all form field to go to next step</p>

                            <div id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li id="author_checklist"><a href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}"><strong>Author's
                                                Checklist</strong></a></li>
                                    <li id="type_title_abstract"
                                        class="{{ Request::path() === 'title-type-abstract' ? 'active' : '' }}"><a
                                            href="{{ route('edit-titleTypeAbstract', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Type,
                                                Title, &amp; Abstract</strong></a>
                                    </li>
                                    <li id="suggested_unsuggested_reviewer">
                                        <a href="{{ route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Reviewers</strong></a>
                                   </li>
                                    <li id="authors_institution"
                                        class="{{ Request::path() === 'author-institution' ? 'active' : '' }}"><a
                                            href="{{ route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Authors
                                                &amp; Institutions</strong></a></li>
                                    <li id="file_upload"
                                        class="{{ Request::path() === 'file-upload' ? 'active' : '' }}"><a
                                            href="{{ route('edit-file-upload', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>File
                                                Upload</strong></a></li>
                                    <li id="proof_submit"><a
                                            href="{{ route('edit-proof-submit', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Proof
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

                                {{-- Step 2: Type, Title, & Abstract --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Type, Title & Abstract</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 6</h2>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card shadow-lg border-0 rounded-lg">
                                                    <div class="card-title">
                                                        <h3 class="text-center bg-info text-success">Type, Title & Abstract
                                                        </h3>
                                                    </div>
                                                 
                                                     <div class="card-body">
                                                        <form action="{{ route('update-titleTypeAbstract', $orderNumber->orderNumber) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="journalID" value="{{ $journal->id }}">
                                                            <input type="hidden" name="companyID" value="{{ $company->id }}">
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1" for="typeOfManuScript"> Type of manuscript</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <select name="typeOfManuScript" id="typeOfManuScript" class="form-control form-select" required>
                                                                            <option value="">Select Type of Manuscript</option>
                                                                            @foreach ($typeofmanuscripts as $typeofmanuscript)
                                                                                <option value="{{ $typeofmanuscript->id }}">
                                                                                    {{ $typeofmanuscript->title }}
                                                                                </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="areaOfSpecificInterest">Areas of
                                                                            specificinterest</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <select name="areaOfSpecificInterest" id="areaOfSpecificInterest"
                                                                            class="form-control form-select" required>
                                                                            <option value="">Select Area of Specific Interest</option>
                                                                            @foreach ($areaofspecificinterests as $areaofspecificinterest)
                                                                                <option value="{{ $areaofspecificinterest->id }}">
                                                                                    {{ $areaofspecificinterest->title }}
                                                                                </option>
                                                                            @endforeach


                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="manuscriptTitle">Title</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="manuscriptTitle"
                                                                            type="text" value="{{$typeTitleAbstract ? $typeTitleAbstract->manuscriptTitle: '' }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="runningTitle">Running title</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="runningTitle"
                                                                            type="text" value="{{ $typeTitleAbstract ? $typeTitleAbstract->runningTitle: '' }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1" for="manuscriptAbstract">Abstract (Max words
                                                                            limit = 350)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <textarea name="manuscriptAbstract" id="manuscriptAbstract" cols="30" rows="10" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="Keywords">Keywords</label>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <input class="form-control" id=""
                                                                                    name="keywords[]" id="keywords" type="text" value="" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">

                                                                                <input class="form-control" id="name"
                                                                                    name="keywords[]" id="keywords" type="text" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">

                                                                                <input class="form-control" id="name"
                                                                                    name="keywords[]" id="keywords" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">

                                                                                <input class="form-control" id=""
                                                                                    name="keywords[]" id="keywords" type="text" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <input class="form-control" id=""
                                                                                    name="keywords[]" id="keywords" type="text" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="manuscriptAcknowledgement">Acknowledgements</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="manuscriptAcknowledgement"
                                                                            type="text" value="{{$typeTitleAbstract ? $typeTitleAbstract->manuscriptAcknowledgement: '' }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           
                                                            <input type="submit" name="next" class="next action-button"  value="Next" />
                                                            <a href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}" name="previous" class="previous action-button-previous">Previous</a>
                                                            {{-- <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> --}}
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>

    <script>
        $(document).ready(function() {
           $('#manuscriptAbstract').summernote();
       });
       
    </script>

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            //var steps = $("fieldset").length;
            //alert(steps);
            var steps = 7;
            setProgressBar(2);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })


        })
    </script>





@endsection
