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
                                    <li id="author_checklist">
                                        <a href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}"><strong>Author's
                                                Checklist</strong></a></li>
                                    <li id="type_title_abstract">
                                        <a href="{{ route('title-type-abstract', [$company->companySEOURL, $journal->seo]) }}"><strong>Type,
                                                Title, &amp; Abstract</strong></a>
                                    </li>
                                     <li id="suggested_unsuggested_reviewer">
                                            <a href="{{ route('reviewer', [$company->companySEOURL, $journal->seo]) }}"><strong>Reviewers</strong></a>
                                    </li>
                                    <li id="authors_institution"><a
                                            href="{{ route('author-institution', [$company->companySEOURL, $journal->seo]) }}"><strong>Authors
                                                &amp; Institutions</strong></a>
                                    </li>
                                    <li id="file_upload"><a
                                            href="{{ route('file-upload', [$company->companySEOURL, $journal->seo]) }}"><strong>File
                                                Upload</strong></a>
                                    </li>
                                    <li id="proof_submit"><a
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

                                {{-- Step 1. Author's Checklist --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Author Checklist:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 6</h2>
                                            </div>
                                        </div>
                                        <form name="frmStep1" id="frmStep1" action="{{ route('submit-first-step') }}" method="POST">
                                            @csrf
                                             <input type="hidden" name="journalID" value="{{ $journal->id }}">
                                             <input type="hidden" name="companyID" value="{{ $company->id }}">
                                            <table class="table table-bordered">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <td>
                                                            <input name="category_all" class="select_all" type="checkbox" value="" id="flexCheckDefault" required>
                                                            <label class="form-check-label" for="flexCheckDefault"> Select All: Author's Checklist</label>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($checklists as $checklist)
                                                        <tr>
                                                            <td><input name="agreement_steps[]" class="checkbox gst"
                                                                    type="checkbox" value="1" id="flexCheckDefault">
                                                                <small>{{ $checklist->description }}</small>
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td>
                                                            <p>Authors of this article confirmed the above instructions and
                                                                following statement.</p>
                                                            <p>Each author took a certain role and contributed to the study
                                                                and the manuscript. In case of publication, I agree to
                                                                transfer all copyright ownership of the manuscript to the
                                                                publisher to use, reproduce, or distribute the article.</p>

                                                            <div class="form-check form-check-inline" role="group" aria-label="Basic radio toggle button group">
                                                                <input type="radio" name="agree" id="agree" value="Agree"><label for="agree" required> Agree</label>
                                                                <input type="radio" name="agree" id="disagree" value="Disagree"><label for="disagree" required> Disagree</label>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td>
                                                            <label for="">Conflict of Interest</label>

                                                            <div class="form-check form-check-inline" role="group">
                                                                <input type="radio" onclick="javascript:yesnoCheck();" name="conflictOfinterest" id="conflictOfinterest" value="Yes" required> Yes
                                                                <input type="radio" onclick="javascript:yesnoCheck();" name="conflictOfinterest" id="conflictOfinterest" value="No" required> No
                                                            </div>
                                                       

                                                            <div id="ifYes" style="visibility:hidden">
                                                                <span>
                                                                    <input type="text" id='clarifyStatement' name="clarifyStatement" class="clarify form-control" placeholder="Clarify Statement">
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                             <input type="submit" name="next" id="step1" class="next action-button" value="Next" />

                                        </form>
                                    </div>

                                </fieldset>



                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 5 - 5</h2>
                                            </div>
                                        </div>
                                        <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully Signed Up
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset> --}}

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
            setProgressBar(1);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })


            // $(".next").click(function() { 

            //     current_fs = $(this).parent();
            //     next_fs = $(this).parent().next();

            //     //Add Class Active
            //     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //     //show the next fieldset
            //     next_fs.show();
            //     //hide the current fieldset with style
            //     current_fs.animate({
            //         opacity: 0
            //     }, {
            //         step: function(now) {
            //             // for making fielset appear animation
            //             opacity = 1 - now;

            //             current_fs.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             next_fs.css({
            //                 'opacity': opacity
            //             });
            //         },
            //         duration: 500
            //     });
            //     setProgressBar(++current);
            // });

            // $(".previous").click(function() {

            //     current_fs = $(this).parent();
            //     previous_fs = $(this).parent().prev();

            //     //Remove class active
            //     $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //     //show the previous fieldset
            //     previous_fs.show();

            //     //hide the current fieldset with style
            //     current_fs.animate({
            //         opacity: 0
            //     }, {
            //         step: function(now) {
            //             // for making fielset appear animation
            //             opacity = 1 - now;

            //             current_fs.css({
            //                 'display': 'none',
            //                 'position': 'relative'
            //             });
            //             previous_fs.css({
            //                 'opacity': opacity
            //             });
            //         },
            //         duration: 500
            //     });
            //     setProgressBar(--current);
            // });

            
        });

        // For Select Option 
        $('.select_all').on('change', function() {
            $('.checkbox').prop('checked', $(this).prop("checked"));
        });
        //deselect "checked all", if one of the listed checkbox category is unchecked amd select "checked all" if all of the listed checkbox category is checked
        $('.checkbox').change(function() { //".checkbox" change 
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('.select_all').prop('checked', true);
            } else {
                $('.select_all').prop('checked', false);
            }
        });

        // For Clarify Statement 

        function yesnoCheck() {
            if (document.getElementById('conflictOfinterest').checked) {
                document.getElementById('ifYes').style.visibility = 'visible';
            } else {
                document.getElementById('ifYes').style.visibility = 'hidden';
            }
        }

        // Submit first step
        
    </script>
@endsection
