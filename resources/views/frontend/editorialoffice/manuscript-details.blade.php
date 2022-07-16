@extends('layouts.list')
@section('title', 'Editorial Office')
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

    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session()->get('success') }}
        </div>
    @endif
    <section id="services" class="services">

        <div class="container aos-init aos-animate" data-aos="fade-up">

            <header class="section-header">

            </header>

            <div class="row">
                <div class="col-md-12">
                    <h3>Welcome to Manuscript Handler - Editorial Office</h3>
                    <p>Please select any heading to proceed with downstream actions. You may face some issues!</p>
                </div>
            </div>



            <div class="container-fluid">
                <div class="row">

                    {{-- <div id="msform"> --}}

                    <form action="" method="">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <div class="card shadow-lg border-0 rounded-lg" id="choose-address-table">
                                            <div class="px-2 bg-info text-success card-title d-flex">
                                                <h4>
                                                    Submitted Manuscripts Status
                                                </h4>

                                            </div>
                                            <div class="card-body">

                                                <table>
                                                    <tbody>
                                                        <form action="" name="frmStatus" id="frmStatus">
                                                            <input type="hidden" name="journalID" id="journalID"
                                                                value="{{ $journal->id }}">
                                                            <input type="hidden" name="companyID" id="companyID"
                                                                value="{{ $company->id }}">
                                                            <input type="hidden" name="orderNumber" id="orderNumber"
                                                                value="{{ $orderNumber }}">


                                                            <tr style="width: 30rem"
                                                                class="d-flex justify-content-between align-item-center">
                                                                <td style="">Manuscript Status</td>
                                                                <td class="">
                                                                    <select style="width:16rem" name="statusselector"
                                                                        id="statusselector" class="form-control form-select" 
                                                                        required>
                                                                        @foreach ($manuscriptStatus as $status)
                                                                            <option value="{{ $status->id }}">
                                                                                {{ $status->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    {{-- class="text-start p-2 bg-info text-success" --}}
                                    <div class="px-2 bg-info text-success card-title d-flex ">
                                        <h3>
                                            Type Title & Abstract
                                        </h3>
                                        {{-- <a href="{{ route('title-type-abstract', [$company->companySEOURL, $journal->seo]) }}">Edit</a> --}}
                                    </div>
                                    <div class="card-body text-left">

                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="arrival_date">
                                                        Type of manuscript</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9 border">
                                                <p>{{ $typeTitleAbstract->typeOfManuscript }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="arrival-airport">Areas of
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
                                                    <label class="small mb-1" for="arrival-airport">Title</label>


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
                                                    <label class="small mb-1">Running title</label>
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
                                                    <label class="small mb-1">Abstract </label>
                                                </div>
                                            </div>
                                            <div class="col-md-9 border">
                                                <div class="form-group">
                                                    {!! $typeTitleAbstract->manuscriptAbstract !!}
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
                                                    <label class="small mb-1" for="room-type">Acknowledgements</label>
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
                                                    <div class="col-md-3" style="background: rgb(226, 221, 221)">
                                                        <span>Name</span>

                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(219, 215, 215)">
                                                        <span>Email</span>

                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(226, 223, 223)">
                                                        <span>Fields of Expertise</span>


                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(228, 225, 225)">
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
                                                            <span>{{ $suggestedrev->recommendingExperties }}</span>


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
                                                    <label class="small" for="arrival-airport">Non-preferred
                                                        reviewers</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">

                                                    <div class="col-md-3" style="background: rgb(209, 208, 208)">
                                                        <span>Name</span>

                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(216, 211, 211)">
                                                        <span>Email</span>


                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(214, 210, 210)">
                                                        <span>Fields of Expertise</span>


                                                    </div>
                                                    <div class="col-md-3" style="background: rgb(212, 208, 208)">
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
                                                            <span>{{ $unsuggestedrev->recommendingExperties }}</span>


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
                                            <div class="px-2 bg-info text-success card-title d-flex">
                                                <h4>
                                                    Authors and Institutions
                                                </h4>
                                                {{-- <a href="{{ route('author-institution', [$company->companySEOURL, $journal->seo]) }}">Edit</a> --}}
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
                                                                <td>{{ $file->fileDesignation }}</td>
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
                        
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->

        <div id="view-create-users-modal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manuscript PDF generated file</h5>
                        <a href="{{ route('marge-pdf-file', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"
                            class="btn btn-primary" target="blank">View/Download pdf</a>
                    </div>
                    <div style="padding: 30px;">
                        {{-- <h4 class="text-center"><b>Manuscript PDF generated file</b></h4> --}}

                        <div>
                            <p>
                                Please click on the View/Download PDF button to view the cover letter of your manuscript. If
                                the cover letter is correct, click on the “Accept” button to proceed with submission. If the
                                PDF file has errors, click on the "Close" button and go back to your submission page to
                                correct the errors. At this stage, you will be unable to see your uploaded files printed in
                                this PDF, however, the editorial office will generate a full PDF containing your all files
                                and upload into you Author Panel before sending the manuscript to Editor of the journal.
                            </p>
                        </div>


                        <div class="d-flex align-items-stretch button-group">
                            <a href="{{ route('pdf-accept', [$company->companySEOURL, $journal->seo, $orderNumber]) }}"
                                class="btn btn-dark btn-lg px-4">Accept</a>
                            <a href="javascript:void(0)" id="to-login2"
                                class="btn btn-lg btn-light-secondary text-secondary font-weight-medium"
                                data-bs-dismiss="modal">Close</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $(function() {
            // when select changes
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#statusselector').on('change', function(e) {

                if(confirm('Are you sure want to change the status?'))
                {
                    
                }

                e.preventDefault();

                var statusselector = $("#statusselector").val();
                var journalID = $("#journalID").val();
                var companyID = $("#companyID").val();
                var orderNumber = $("#orderNumber").val();



                $.ajax({

                    method: 'post',
                    url: "{{ route('change-manuscript-status') }}",

                    data: {
                        orderNumber: orderNumber,
                        journalID: journalID,
                        companyID: companyID,
                        statusselector: statusselector
                    },
                    success: function(response) {

                        toastr.success(response.success)
                    }
                });
            });
        });
    </script>

@endsection
