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
            <p>Author's Panel</p>
        </header>

        <div class="row">
            <div class="col-md-12">

                <p>To proceed with the submission of a new manuscript, click on the “Submit New Manuscript” section. All incomplete submissions will be placed in the “Incomplete Submissions”. If all the required information is completed, a final
                    PDF has to be generated for approval by the author. This manuscript will be under “Waiting for Author’s Approval”. Once approved, the article will be submitted and will be moved to “Submissions Being Processed” section. Please
                    note that for a successful submitted manuscript, that manuscript must be under “Submissions Being Processed” and you must have received a confirmatory email on your provided email address.</p>

                <p>Once the Editor makes a decision, the manuscript will move to “Submissions with Decision” and it will be notified to the author.</p>

                <p>Authors can revise the manuscripts with major or minor revision, corresponding to “New Submissions” information. The final revised and submitted manuscripts must be under “Revisions Being Processed” and you must have received confirmatory
                    emails.
                </p>

                <p>Communication will be made with the authors once manuscripts are accepted and “Galley Proof” are sent to the authors and will be displayed under “Published” once are published on the journal’s home page.</p>

                <p>The number indicates the numbers of the manuscript in each section. Click on any tab, the corresponding manuscript will be displayed at the bottom of this page and the detail can be viewed by clicking on the edit symbol under “Action”
                    section.
                </p>

                <p>Please note that the manuscripts with deficiencies will be sent back to authors for further actions and will be displayed in “Sent Back to Author”.</p>

                <p>Upon submission of the manuscript, you can check the status of the manuscript by clicking at "Submissions/Revisions Being Processed". Explain the "Status" of the Manuscript in Submission/Revisions Being Processed:</p>

                <p>Awaiting Reviewer Selection: Manuscript is not yet assigned to any reviewers</p>
                <p>Awaiting Reviewers Consent: Manuscript has been assigned to reviewers and we are waiting to hear the consent of reviewers whether they are willing or not to review this manuscript.</p>
                <p>Awaiting Reviewers Reports: Reviewer(s) agreed to review the manuscript and we are now waiting for his/her/their assessments to be submitted. Please note that manuscript takes most of the processing time at this stage since submission
                    of reviewer's reports is on their disposition. In order to provide rapid review and publication for our authors, we keep reminding reviewers for timely submission of their feedback, and your patience in this matter will be
                    highly appreciated.</p>
                <p>Awaiting Editor's Decision: The review process is completed and now manuscript is with Editor for the final decision</p>

                <p>If you feel any difficulties in submitting your manuscript via this Manuscript Handler, please contact us at info@manuscripthandler.com and state the issue.</p>

            </div>
        </div>

        <div class="row gy-4">

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <div class="service-box blue">
                    <i class="ri-discuss-line icon"></i>
                    <h3>New Submissions</h3>
                    <ul class="dashboard-ul-list">
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('newsubmission', [$company->companySEOURL, $seo->seo]) }}">Submit New Manuscript</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('incomplete-submission', [$company->companySEOURL, $seo->seo]) }}">Incomplete Submissions ({{ App\Models\Mh_Sms_Authorchecklist::where('submitStatus', '0')->where('journalID', $seo->id)->where('userID', auth()->user()->id)->get()->count() }})</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('authors-approval', [$company->companySEOURL, $seo->seo]) }}">Submissions Waiting for Author's Approval ({{ App\Models\Mh_Sms_Authorchecklist::where([['submitStatus', '0'],['pdf_accept', '1']])->get()->count() }})</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('authors-approval', [$company->companySEOURL, $seo->seo]) }}">Submissions Being Processed ({{ App\Models\Mh_Sms_Authorchecklist::where([['submitStatus', '1'],['pdf_accept', '1']])->get()->count() }})</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <div class="service-box orange">
                    <i class="ri-discuss-line icon"></i>
                    <h3>Revisions</h3>
                    <ul class="dashboard-ul-list">
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions Needing Revision (0)</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Revisions Waiting for Author's Approval (0)</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Revisions Being Processed (0)</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                <div class="service-box green">
                    <i class="ri-discuss-line icon"></i>
                    <h3>Decisions</h3>
                    <ul class="dashboard-ul-list">
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions with a Decision (0)</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Sent Back to Author (0)</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                <div class="service-box red">
                    <i class="ri-discuss-line icon"></i>
                    <h3>Author's Resources</h3>
                    <ul class="dashboard-ul-list">
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Author's Tutorial (PDF)</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Author's Tutorial (Video)</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                <div class="service-box purple">
                    <i class="ri-discuss-line icon"></i>
                    <h3>Publications</h3>
                    <ul class="dashboard-ul-list">
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Galley Proof (0)</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Published (0)</a></li>
                    </ul>
                </div>
            </div>



        </div>

    </div>

</section>


@endsection
