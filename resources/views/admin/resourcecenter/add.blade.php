@extends('layouts.admin')

@section('title', 'Add_resource_center')

@section('content')


@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif


    <div >
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Add Resource</h4>
       </div>
       <form method="post" action="{{ route('resourcecenter-store')}}" enctype="multipart/form-data">
        @csrf
               
                <div class="card-body">
                
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">User Type</label>
                        <div class="col-sm-7">
                        
                            <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type" >
                                <option>Reviewer</option>
                                <option>Auhtors</option>
                                <option>Editors</option>
                                <option>Asc.Editors</option>
                                <option>Publisher</option>
                                <option>Author Copyright</option>
        

                            </select>

                            @error('user_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


       

                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Youtube Link:</label>
                        <div class="col-sm-7">
                            <input type="text"  class="form-control @error('youtubelink') is-invalid @enderror" id="youtubelink" name="youtubelink" placeholder="https://www.youtube.com/">
                       
                            @error('youtubelink')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                       
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Tutorial PDF File:</label>
                        <div class="col-sm-7">
                            <input type="file"  class="form-control @error('pdffile') is-invalid @enderror" id="pdffile" name="pdffile" >
                       
                            @error('pdffile')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                       
                        </div>
                    </div>

            
              
            
                </div>
                <div class="p-3 border-top">
                    <div class="text-end"  style="padding-right: 150px">
                        <button   type="submit" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Submit</button>
               </div>
                </div>
            </form>
        </div>
    </div>


@endsection