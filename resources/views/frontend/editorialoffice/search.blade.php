<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
        </ol>
        <h2>Inner Page</h2>

    </div>
</section>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome to Manuscript Handler - Editorial Office</h3>
            <p>Please select any heading to proceed with downstream actions. You may face some issues!</p>
        </div>
    </div>
</div>

<section class="container pt-0">
    <div class="card">
        <div class="card-header bg-primary text-white"><i class="bi bi-search"> </i> Quick Search</div>
        <div class="card-body p-3">
            <div class="row g-3 align-items-center">
                <div class="col-lg-4">
                    <label for="id" class="col-lg-12 col-form-label">Manuscript ID</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="id" class="form-control ">
                </div>

                <div class="col-lg-2">
                    <label for="title" class="col-form-label ms-3">Title</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="title" class="form-control">
                </div>
            </div>

            <div class="row g-3 align-items-center mt-3">


                <div class="col-lg-4">
                    <label for="author" class="col-form-label">Author's First (Given)or Last (Family)
                        name</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="author" class="form-control">
                </div>

                <div class="col-2">
                    <label for="keywords" class="col-form-label ms-3">Keywords</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="keywords" class="form-control">
                </div>
            </div>

            <div class="row g-3 align-items-center mt-3" >
                <button class="btn btn-primary "  style="width: 80px; margin-left:370px" >Search</button>
            </div>
        </div>
    </div>


</section>
<section class="container pt-0">
    <div class="d-flex justify-content-between m-auto">
        <div class="devide border"  >
            <div class="card-header bg-primary text-white">Total Assigments</div>
            <div class="card-body ms-4">
                <div class="row g-3 align-items-center ">
                    <ol class="olhalf list-group-number ">
                        <div class="row">
                        <li class="col-lg-6 my-3" > <a href="{{ route('manuscripts-all', [$company->companySEOURL, $seo->seo])}}">  Manuscript Submitted ({{ $counters['count_manuscript_submitted'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('initial_quality_control_all', [$company->companySEOURL, $seo->seo])}}"> Initial Quality Control({{ $counters['count_initialqualitycontrol'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"> <a href="{{ route('need-author-attentions-all', [$company->companySEOURL, $seo->seo]) }}" >  Need Author Attention({{ $counters['count_need_author_attentions'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('with_editor_all', [$company->companySEOURL, $seo->seo]) }}" >With Editor({{ $counters['count_witheditor'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"> <a href="{{ route('with-associate-editor-all', [$company->companySEOURL, $seo->seo]) }}" > With Associate Editor ({{ $counters['count_associate_editor'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('under_review_all', [$company->companySEOURL, $seo->seo]) }}" >Under Review({{ $counters['count_underreview'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('decidion_in_process', [$company->companySEOURL, $seo->seo]) }}" >Decidion in Process({{ $counters['count_decision_process'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('revision_required_all', [$company->companySEOURL, $seo->seo]) }}" >Revision Required({{ $counters['count_revisionrequired'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('accepted_all', [$company->companySEOURL, $seo->seo]) }}">Accepted({{ $counters['count_accepted'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('accepted_with_major_revision_all', [$company->companySEOURL, $seo->seo]) }}" >Accepted with Major Revision({{ $counters['count_acceptedMajorRevision'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('accepted_with_minor_revision_all', [$company->companySEOURL, $seo->seo]) }}" >Accepted with Minor Revisions({{ $counters['count_accepted_minor_revisions'] }})</a> </li>
                        <li class="col-lg-6 my-3"><a href="{{ route('rejected_all', [$company->companySEOURL, $seo->seo]) }}" > Rejected({{ $counters['count_rejectd'] }})</a></li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('withdrawn_manuscripts_all', [$company->companySEOURL, $seo->seo]) }}">Withdrawn Manuscripts({{ $counters['count_withdrawn_manuscripts'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('sent_to_production_all', [$company->companySEOURL, $seo->seo]) }}" >Sent to Production({{ $counters['count_sentproduction'] }})</a></li>
                    </div>
                    
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('published_manuscripts_all', [$company->companySEOURL, $seo->seo]) }}">Published({{ $counters['count_published'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('submissions_needing_authors_approval_all', [$company->companySEOURL, $seo->seo]) }}" >Submissions Neding Author's Approval({{ $counters['count_submissionsapproval'] }})</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3"><a href="{{ route('total_manuscripts_progress_all', [$company->companySEOURL, $seo->seo]) }}">Total Manuscript In Process({{ $counters['count_TotalManuscriptProcess'] }})</a></li>
                        <li class="col-lg-6 my-3"><a href="{{ route('revisions_needing_authors_approval_all', [$company->companySEOURL, $seo->seo]) }}" >Revisions needing Author's Approval({{ $counters['count_revisionsapproval'] }})</a></li>
                    </div>
                        
                    </ol>

                </div>
            </div>
        </div>

        <div class="devide border">
            <div  class="card-header bg-primary text-white "></i>Per Journal Assigments <select class=" border-0 " name="" id=""><option value="">Journal of Demonstrations</option><option value="">Journal of Demonstrations</option></select></div>
            <div class="card-body ms-4">
                <div class="row g-3 align-items-center">
                    <ol class="olhalf list-group-number ">
                        <div class="row">
                        <li class="col-lg-6 my-3">Manuscript Submitted</li>
                        <li class="col-lg-6 my-3">Initial Quality Control</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Need Author Attention</li>
                        <li class="col-lg-6 my-3">With Editor</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">With Associate Editor</li>
                        <li class="col-lg-6 my-3">Under Review</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Decidion in Process</li>
                        <li class="col-lg-6 my-3">Revision Required</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Accepted</li>
                        <li class="col-lg-6 my-3">Accepted with Major Revision</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Accepted with Minor Revisions</li>
                        <li class="col-lg-6 my-3 ">Rejected</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Withdrawn Manuscripts</li>
                        <li class="col-lg-6 my-3">Sent to Production</li>
                    </div>
                    
                    <div class="row">
                        <li class="col-lg-6 my-3">Published</li>
                        <li class="col-lg-6 my-3">Submissions Neding Author's Approval</li>
                    </div>
                    <div class="row">
                        <li class="col-lg-6 my-3">Total Manuscript In Process</li>
                        <li class="col-lg-6 my-3">Revisions needing Author's Approval</li>
                    </div>
                        
                    </ol>
                </div>
            </div>
        </div>


</section>