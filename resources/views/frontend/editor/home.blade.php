@extends('layouts.list')
@section('title', 'Editors Panel')
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
                <p>Editor's Panel</p>
            </header>

            <div class="row">
                <div class="col-md-12">

                    <h3>Welcome to Manuscript Handler - Editor's Panel</h3>
                    <p>Each Editor-In-Chief is informed by an email when a new manuscript is submitted to his/her journal.
                        The manuscript is quality checked by the Editorial Office and sent to "Editor's Panel" which can be
                        seen in the "Awaiting Reviewer Selection" tab under "Editor Assignments".
                        Clicking on "Awaiting Reviewer Selection" will list all manuscripts at the bottom. You can assess
                        the credibility of the author by searching it in PubMed (by clicking on the icon) or look up the
                        title. Once you are ready to process (read and send for review) the manuscript,
                        you can click on "edit icon" under "Actions" to perform any of the following functions:</p>

                    <p>Once the Editor makes a decision, the manuscript will move to “Submissions with Decision” and it will
                        be notified to the author.</p>
                </div>
            </div>

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box blue">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Editor Assignments</h3>
                        <ul class="dashboard-ul-list">
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('awaiting-reviewer-selection', [$company->companySEOURL, $journal->seo]) }}">Awaiting Reviewer Selection ({{ App\Models\Mh_Sms_Authorchecklist::where('manuscriptStatus', '6')->get()->count() }})</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">Awaiting Reviewer Consent ( 3)</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">Awaiting Reviewer Reports (0)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">Awaiting Editor's Decision (0)</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">
                                    Submissions with Editor's Decision (17) <br>
                                    Accept(7), Minor Revision(7), Major Revision(3), <br>
                                    Returned (0) Reject (0)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">With Associate Editor (1)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="">Decision by Associate Editor (4)</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-box orange">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Publication Progress</h3>
                        <ul class="dashboard-ul-list">
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Total Submissions in Progress (0)</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions Being Proof Read &
                                    Copyedited (0)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions Being Approved by Authors
                                    (0)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions Approved by Authors
                                    (1)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions Published and Archived
                                    (1)</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-box purple">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Quick Search</h3>
                        <form class="form-inline">
                            <div class="form-group mb-2">
                                <label for="staticEmail2">Manuscript ID</label>
                                <input type="text" class="form-control" id=""
                                    value="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="inputPassword2">Title</label>
                                <input type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="staticEmail2">Author's First (Given) or Last (Family) name</label>
                                <input type="text" class="form-control" id=""
                                    value="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="staticEmail2">Keywords</label>
                                <input type="text" class="form-control" id=""
                                    value="">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-box green">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Decisions</h3>
                        <ul class="dashboard-ul-list">
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Submissions with a Decision (0)</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Sent Back to Author (0)</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-box red">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Special Issues in this Journal</h3>
                        <ul class="dashboard-ul-list">
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Desmonstration (30)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Mycology (11)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Veterinary Sciences (3)</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-box purple">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Editor Resources</h3>
                        <ul class="dashboard-ul-list">
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Tutorial for Editor (PDF)</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Tutorial for Editor (Video)</a></li>
                        </ul>
                    </div>
                </div>
               



            </div>

        </div>

    </section>


@endsection
