@extends('layouts.list')
@section('title', 'Authors Panel')
@section('content')


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    >


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
                                                Checklist</strong></a>

                                    </li>
                                    <li id="type_title_abstract"><a
                                            href="{{ route('edit-titleTypeAbstract', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Type,
                                                Title, &amp; Abstract</strong></a>
                                    </li>
                                    <li id="suggested_unsuggested_reviewer">
                                        <a
                                            href="{{ route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Reviewers</strong></a>
                                    </li>
                                    <li id="authors_institution"><a
                                            href="{{ route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Authors
                                                &amp; Institutions</strong></a></li>
                                    <li id="file_upload"><a
                                            href="{{ route('edit-file-upload', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>File
                                                Upload</strong></a>
                                    </li>
                                    <li id="proof_submit"><a
                                            href="{{ route('proof-submit', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Proof
                                                &amp; Submit</strong></a></li>
                                    <li id="confirm"><a
                                            href="{{ route('finish-new-manuscript', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"><strong>Finish</strong></a>
                                    </li>

                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                                <!-- fieldsets -->
                                {{-- Step 3: Authors & Institutions --}}
                                <fieldset>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <div class="card shadow-lg border-0 rounded-lg"
                                                        id="choose-address-table">
                                                        <div class="p-2 bg-info text-success justify-content-center ">
                                                            <h4>
                                                                Authors and Institutions
                                                            </h4>

                                                        </div>

                                                        <div class="card-body">
                                                                <table class="table" id="table_authors">
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
                                                                            <th>
                                                                                <a class="btn btn-primary"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#myModel">Add</a>

                                                                            </th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($authorinstitution as $author)
                                                                            <tr>
                                                                                <td>{{ $author->authSequence }}</td>
                                                                                <td>{{ $author->authTitle }}</td>
                                                                                <td>{{ $author->authFirstName }}</td>
                                                                                <td>{{ $author->authLastName }}</td>
                                                                                <td>{{ $author->authEmailAddress }}</td>
                                                                                <td>{{ $author->authAffiliation }}</td>
                                                                                <td>{{ $author->authCountry }}</td>
                                                                                <td>{{ $author->authCorresponding }}</td>

                                                                                <td>

                                                                                   <form method="POST" action="{{ route('delete-author', [$company->companySEOURL, $journal->seo, $author->id]) }}">
                                                                                        @csrf
                                                                                        <button type="submit"
                                                                                            class="btn btn-outline-danger btn-flat show-alert-delete-box btn-sm bi bi-x-circle"
                                                                                            data-toggle="tooltip"
                                                                                            title='Delete'></button>
                                                                                    
                                                                                    </form>
                                                                                    {{-- <a href="{{ route('delete-author', [$company->companySEOURL, $journal->seo, $author->id]) }}"
                                                                                        onclick="return window.confirm('Are You Sure to Delete This Author?');"
                                                                                        class="btn btn-outline-danger btn-sm bi bi-x-circle"></a> --}}

                                                                                </td>

                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>

                                                                <a href="{{ route('edit-file-upload', [$company->companySEOURL, $journal->seo,  $orderNumber]) }}"
                                                                    name="next" class="next action-button">Next</a>
                                                                <a href="{{ route('edit-reviewer', [$company->companySEOURL, $journal->seo,  $orderNumber]) }}"
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
        </div>


        <!--  Modal -->
        
        <div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Email Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-author-institution', $orderNumber) }}" method="post">

                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="journalID" id="auth_journalID" value="{{ $journal->id }}">
                            <input type="hidden" name="companyID" id="auth_companyID" value="{{ $company->id }}">

                            <div class="mb-3">

                                <label for="">Email</label>
                                <input type="email" class="form-control" id="authEmailAddress" name="authEmailAddress"
                                    placeholder="Add reviewer email address" autocomplete="off" />

                            </div>
                            <div class="mb-3">

                                <label for="">Title</label>
                                <select name="authTitle" id="authTitle" class="form-control form-select">
                                    <option value="">Title</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Prof.">Prof.</option>

                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">

                                <label for="">First Name</label>
                                <input type="text" class="form-control"id="authFirstName" name="authFirstName" />
                            </div>
                            <div class="mb-3">

                                <label for="">Last Name</label>
                                <input type="text" class="form-control" id="authLastName" name="authLastName" />
                            </div>

                            <div class="mb-3">

                                <label for="">Affiliation</label>
                                <input type="text" class="form-control"id="authAffiliation" name="authAffiliation" />
                            </div>

                            <div class="mb-3">

                                <label for="">Corresponding</label>
                                <input type="radio" class="form-check-input" name="authCorresponding"
                                    id="authCorresponding">
                            </div>
                            <div class="mb-3">
                                <label for="">Country</label>
                                <select name="authCountry" id="authCountry" class="form-control form-select">
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
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#authEmailAddress").change(function(e) {

                // alert('authEmailAddress'); return false;


                e.preventDefault();

                var authEmailAddress = $("#authEmailAddress").val();
                var auth_journalID = $("#auth_journalID").val();
                var auth_companyID = $("#auth_companyID").val();
                //alert(authEmailAddress);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('update-search-email', $orderNumber) }}",
                    data: {
                        authEmailAddress: authEmailAddress,
                        auth_journalID: auth_journalID,
                        auth_companyID: auth_companyID,
                    },
                    success: function(data) {
                        // alert(JSON.stringify(data));
                        var exist = data.exist;
                        var message = data.message;
                        var record = data.data[0];
                        var authFirstName = record.firstName + ' ' + record.middleName;
                        var authLastName = record.lastName;
                        var authTitle = record.prefixType;
                        var authAffiliation = record.institution;


                        //alert(rev_RecommendingName);
                        var country = record.country;


                        if (exist == true) {
                            //$('#message').html(message);
                            $('#authFirstName').val(authFirstName);
                            $('#authLastName').val(authLastName);
                            $('#authTitle').val(authTitle);
                            $('#authAffiliation').val(authAffiliation);
                            $('#authCountry').val(country).attr("selected", "selected");
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
            setProgressBar(4);

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
