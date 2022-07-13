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
                                    <li id="author_checklist" class=""><a
                                            href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}"><strong>Author's
                                                Checklist</strong></a></li>
                                    <li id="type_title_abstract"
                                        class="{{ Request::path() === 'title-type-abstract' ? 'active' : '' }}"><a
                                            href="{{ route('edit-titleTypeAbstract', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Type,
                                                Title, &amp; Abstract</strong></a>
                                    </li>
                                    <li id="suggested_unsuggested_reviewer">
                                        <a
                                            href="{{ route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Reviewers</strong></a>
                                    </li>
                                    <li id="authors_institution"
                                        class="{{ Request::path() === 'author-institution' ? 'active' : '' }}"><a
                                            href="{{ route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Authors
                                                &amp; Institutions</strong></a></li>
                                    <li id="file_upload" class="{{ Request::path() === 'file-upload' ? 'active' : '' }}">
                                        <a
                                            href="{{ route('edit-file-upload', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>File
                                                Upload</strong></a></li>
                                    <li id="proof_submit"
                                        class="{{ Request::path() === 'proof-submit' ? 'active' : '' }}"><a
                                            href="{{ route('proof-submit', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Proof
                                                &amp; Submit</strong></a></li>
                                    <li id="confirm"><a
                                            href="{{ route('finish-new-manuscript', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"><strong>Finish</strong></a>
                                    </li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- fieldsets -->

                                {{-- Step 2: Type, Title, & Abstract --}}
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Suggested & Non-Suggested Reviewers</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 6</h2>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="card shadow-lg border-0 rounded-lg">
                                                    <div class="card-title">
                                                        <h3 class="text-center bg-info text-success">Suggested & Non-Suggested Reviewers
                                                        </h3>
                                                    </div>


                                                    <div class="card-body">
                                                        <form action="{{ route('update-reviewer', $orderNumber->orderNumber) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="journalID" value="{{ $journal->id }}">
                                                            <input type="hidden" name="companyID" value="{{ $company->id }}">

                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="small mb-1"
                                                                            for="arrival-airport">Suggested
                                                                            reviewers(*atleast 6 are required)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-3"><span>Name</span>

                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <span>Email</span>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <span>Fields of Expertise</span>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <span>Affiliation</span>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <span>Country</span>
                                                                        </div>

                                                                    </div>

                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-3">
                                                                                <input class="form-control"
                                                                                    name="rev_RecommendingName[]"
                                                                                    id="rev_RecommendingName" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_RecommendingEmail"
                                                                                    name="rev_RecommendingEmail[]"
                                                                                    type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_RecommendingExpert"
                                                                                    name="rev_RecommendingExpert[]" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_RecommendingAffiliation"
                                                                                    name="rev_RecommendingAffiliation[]" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <select name="rev_RecommendingCountryID[]" id="rev_RecommendingCountryID"
                                                                                    class="form-control form-select" required>
                                                                                    @foreach ($countries as $country)
                                                                                        <option
                                                                                            value="{{ $country->name }}">
                                                                                            {{ $country->name }}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                    @endfor

                                                                </div>
                                                            </div>
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
                                                                        <div class="col-md-3">
                                                                            <span>Name</span>

                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <span>Email</span>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <span>Fields of Expertise</span>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <span>Affiliation</span>

                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <span>Country</span>
                                                                        </div>

                                                                    </div>
                                                                    @for ($e = 0; $e < 5; $e++)
                                                                        <div class="row mt-3">

                                                                            <div class="col-md-3">
                                                                                <input class="form-control"
                                                                                    name="rev_NonRecommendingName[]"
                                                                                    id="rev_NonRecommendingName" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_NonRecommendingEmail"
                                                                                    name="rev_NonRecommendingEmail[]"
                                                                                    type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_NonRecommendingExpert"
                                                                                    name="rev_NonRecommendingExpert[]" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input class="form-control" id="rev_NonRecommendingAffiliation"
                                                                                    name="rev_NonRecommendingAffiliation[]" type="text" required/>

                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <select name="rev_NonRecommendingCountryID[]" id="rev_NonRecommendingCountryID"
                                                                                    class="form-control form-select" required>
                                                                                    @foreach ($countries as $country)
                                                                                        <option
                                                                                            value="{{ $country->name }}">
                                                                                            {{ $country->name }}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                    @endfor

                                                                </div>
                                                            </div>
                                                            <input type="submit" name="next" class="next action-button"  value="Next" />
                                                            <a href="{{ route('newsubmission', [$company->companySEOURL, $journal->seo]) }}" name="previous" class="previous action-button-previous">Previous</a>

                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset> --}}

                                <fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <div class="card shadow-lg border-0 rounded-lg"
                                                        id="choose-address-table">
                                                        <div class="p-2 bg-info text-success justify-content-center ">
                                                            <h4>
                                                                Suggested Reviewers
                                                            </h4>

                                                        </div>

                                                        <div class="card-body">


                                                            <table class="table" id="table_authors">
                                                                <thead>
                                                                    <tr>

                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Fields of Expertise</th>
                                                                        <th>Affiliation</th>
                                                                        <th>Country</th>
                                                                        <th>

                                                                            <a class="btn btn-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#myModel">Add</a>

                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($sreviewers as $item)
                                                                        <tr>
                                                                            <td>{{ $item->recommendingName }}</td>
                                                                            <td>{{ $item->recommendingEmail }}</td>
                                                                            <td>{{ $item->recommendingExperties }}</td>
                                                                            <td>{{ $item->recommendingAffiliation }}
                                                                            </td>
                                                                            <td>{{ $item->recommendingCountry }}</td>
                                                                            <td>

                                                                                <form method="POST"
                                                                                    action="{{ route('sreviewer-delete', [$company->companySEOURL, $journal->seo,$orderNumber->orderNumber, $item->id]) }}">
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

                                                    <div class="card shadow-lg border-0 rounded-lg mt-3"
                                                        id="choose-address-table">
                                                        <div class="p-2 bg-info text-success justify-content-center ">
                                                            <h4>
                                                                Non-Suggested Reviewers
                                                            </h4>

                                                        </div>
                                                        <div class="card-body">

                                                            <table class="table" id="table_authors">
                                                                <thead>
                                                                    <tr>

                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Fields of Expertise</th>
                                                                        <th>Affiliation</th>
                                                                        <th>Country</th>
                                                                        <th>

                                                                            <a class="btn btn-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#unsreviewer">Add</a>

                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    @foreach ($unsreviewers as $unsreviewer)
                                                                        <tr>
                                                                            <td>{{ $unsreviewer->recommendingName }}
                                                                            </td>
                                                                            <td>{{ $unsreviewer->recommendingEmail }}
                                                                            </td>
                                                                            <td>{{ $unsreviewer->recommendingExperties }}
                                                                            </td>
                                                                            <td>{{ $unsreviewer->recommendingAffiliation }}
                                                                            </td>
                                                                            <td>{{ $unsreviewer->recommendingCountry }}
                                                                            </td>
                                                                            <td>

                                                                                <form method="POST"
                                                                                    action="{{ route('unsreviewer-delete', [$company->companySEOURL, $journal->seo,$orderNumber->orderNumber, $unsreviewer->id]) }}">
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


                                                            <a href="{{ route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber->orderNumber]) }}"
                                                                name="next" class="next action-button">Next</a>
                                                            <a href="{{ route('title-type-abstract', [$company->companySEOURL, $journal->seo]) }}"
                                                                name="previous"
                                                                class="previous action-button-previous">Previous</a>

                                                        </div>
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

    <div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Email Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update-suggested-reviewer', $orderNumber->orderNumber) }}" method="post">

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="journalID" id="rev_journalID" value="{{ $journal->id }}">
                        <input type="hidden" name="companyID" id="rev_companyID" value="{{ $company->id }}">
                        <div class="mb-3">

                            <label for="">Email</label>
                            <input type="email" name="rev_RecommendingEmail" class="form-control"
                                id="rev_RecommendingEmail" placeholder="Add reviewer email address" autocomplete="off">
                        </div>
                        <div class="mb-3">

                            <label for="">Name</label>
                            <input type="text" class="form-control" name="rev_RecommendingName"
                                id="rev_RecommendingName" value="" />
                        </div>
                        <div class="mb-3">

                            <label for="">Expertise</label>
                            <input type="text" class="form-control" name="rev_RecommendingExpert"
                                id="rev_RecommendingExpert" value="" />
                        </div>
                        <div class="mb-3">

                            <label for="">Affiliation</label>
                            <input type="text" class="form-control" name="rev_RecommendingAffiliation"
                                id="rev_RecommendingAffiliation" value="" />
                        </div>

                        <div class="mb-3">
                            <label for="">Country</label>
                            <select name="rev_RecommendingCountryID" id="rev_RecommendingCountryID"
                                class="form-control form-select">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="javascript:">Add Email</a> --}}
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="unsreviewer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Email Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update-unsreviewer', $orderNumber->orderNumber) }}" method="post">

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="journalID" id="rev_journalID" value="{{ $journal->id }}">
                        <input type="hidden" name="companyID" id="rev_companyID" value="{{ $company->id }}">
                        <div class="mb-3">

                            <label for="">Email</label>
                            <input type="email" name="rev_NonRecommendingEmail" class="form-control"
                                id="rev_NonRecommendingEmail" placeholder="Add reviewer email address"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">

                            <label for="">Name</label>
                            <input type="text" class="form-control" name="rev_NonRecommendingName"
                                id="rev_NonRecommendingName" value="" />
                        </div>
                        <div class="mb-3">

                            <label for="">Expertise</label>
                            <input type="text" class="form-control" name="rev_NonRecommendingExpert"
                                id="rev_NonRecommendingExpert" value="" />
                        </div>
                        <div class="mb-3">

                            <label for="">Affiliation</label>
                            <input type="text" class="form-control" name="rev_NonRecommendingAffiliation"
                                id="rev_NonRecommendingAffiliation" value="" />
                        </div>

                        <div class="mb-3">
                            <label for="">Country</label>
                            <select name="rev_NonRecommendingCountryID" id="rev_NonRecommendingCountryID"
                                class="form-control form-select">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="javascript:">Add Email</a> --}}
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#rev_RecommendingEmail").change(function(e) {

                //alert('rev_RecommendingEmail'); return false;

                e.preventDefault();

                var rev_RecommendingEmail = $("#rev_RecommendingEmail").val();
                var rev_JournalID = $("#rev_journalID").val();
                var rev_companyID = $("#rev_companyID").val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('search-reviewer') }}",
                    data: {
                        rev_RecommendingEmail: rev_RecommendingEmail,
                        rev_JournalID: rev_JournalID,
                        rev_companyID: rev_companyID,
                    },
                    success: function(data) {
                        //alert(JSON.stringify(data));
                        //alert(data.data[0].prefixType);

                        //return false;

                        var exist = data.exist;
                        var message = data.message;
                        var record = data.data[0];
                        //alert(JSON.stringify(record));
                        //alert(record.prefixType);
                        var rev_RecommendingName = record.prefixType + ' ' + record.firstName +
                            ' ' + record.middleName + ' ' + record.lastName;
                        var rev_RecommendingExpert = record.department;
                        var rev_RecommendingAffiliation = record.institution;


                        //alert(rev_RecommendingName);
                        var country = record.country;


                        if (exist == true) {
                            //$('#message').html(message);
                            $('#rev_RecommendingName').val(rev_RecommendingName);
                            $('#rev_RecommendingExpert').val(rev_RecommendingExpert);
                            $('#rev_RecommendingAffiliation').val(rev_RecommendingAffiliation);
                            $('#rev_RecommendingCountryID').val(country).attr("selected",
                                "selected");
                        } else if (exist == false) {

                        }
                    }
                });

            });

            $("#rev_RecommendingEmail").change(function(e) {


                e.preventDefault();

                var rev_NonRecommendingEmail = $("#rev_NonRecommendingEmail").val();
                var rev_JournalID = $("#rev_journalID").val();
                var rev_companyID = $("#rev_companyID").val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('search-reviewer') }}",
                    data: {
                        rev_NonRecommendingEmail: rev_NonRecommendingEmail,
                        rev_JournalID: rev_JournalID,
                        rev_companyID: rev_companyID,
                    },
                    success: function(data) {
                        //alert(JSON.stringify(data));
                        //alert(data.data[0].prefixType);

                        //return false;

                        var exist = data.exist;
                        var message = data.message;
                        var record = data.data[0];
                        //alert(JSON.stringify(record));
                        //alert(record.prefixType);
                        var rev_NonRecommendingName = record.prefixType + ' ' + record
                            .firstName +
                            ' ' + record.middleName + ' ' + record.lastName;
                        var rev_NonRecommendingExpert = record.department;
                        var rev_NonRecommendingAffiliation = record.institution;


                        //alert(rev_RecommendingName);
                        var country = record.country;


                        if (exist == true) {
                            //$('#message').html(message);
                            $('#rev_NonRecommendingName').val(rev_NonRecommendingName);
                            $('#rev_RecommendingExpert').val(rev_NonRecommendingExpert);
                            $('#rev_NonRecommendingAffiliation').val(
                                rev_NonRecommendingAffiliation);
                            $('#rev_NonRecommendingCountryID').val(country).attr("selected",
                                "selected");
                        } else if (exist == false) {

                        }
                    }
                });

            });
        });

        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = 7;
            setProgressBar(3);

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            });





            @if (Session::has('message'))
                toastr.success('{{ Session::get('message') }}', 'Success');
            @endif
        });
    </script>






@endsection
