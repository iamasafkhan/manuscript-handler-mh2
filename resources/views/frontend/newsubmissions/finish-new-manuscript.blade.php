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
                    <p>Please include the names and affiliations of all authors of this manuscript and mark the corresponding author by selecting the “Corresponding Author” button.
                        You can add as many authors as your wish by clicking on the “Add Author” button. Please make sure to fill the correct email address to receive submission confirmatory email and to receive future correspondence.</p>
                 
                  <p>After completion of all required fields, click on "Update" to save the page or "Update & Next" to proceed to next page and save the current.
                       Click on “Previous” to go back to previous page. If there is nothing to change, click on "Skip".</p>

                </div>
            </div>



            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2 id="heading">You Have Complete Your Submissions  Successfully.</h2>
                            <p>Thank You For Submissions</p>

                            <div id="msform">
                               
                                   <fieldset>
                                    <div class="form-card">
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="{{ asset('finish/GwStPmg.png') }}" class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Complete Your Submissions  Successfully. <a href="">Go To Home</a>
                                                </h5>
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

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            // var steps = $("fieldset").length;
            //alert(steps);
            var steps = 6;
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

            @if (Session::has('message')) 
                  toastr.success('{{ Session::get('message') }}', 'Success');
            @endif
            
        });

       
        
    </script>
@endsection
