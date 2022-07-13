@extends('layouts.admin')

@section('title', 'Edit_social Links')

@section('content')


@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Edit Social Links</h4>
       </div>
       <form method="post" action="{{ route('sociallinks-update')}}" enctype="multipart/form-data">
        @csrf
               
                <div class="card-body">
                
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Facebook:</label>
                        <div class="col-sm-9">
                        
                            <input type="text"  class="form-control @error('facebook') is-invalid @enderror"  name="facebook" id="facebook"  value="{{$socialLinks->facebook}}" >
                        
                            @error('facebook')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Twitter:</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{$socialLinks->twitter}}" >
                            @error('twitter')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">LinkedIn:</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{$socialLinks->linkedin}}" >
                            @error('linkedin')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Google Plus:</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('googleplus') is-invalid @enderror" id="googleplus" name="googleplus" value="{{$socialLinks->googleplus}}" >
                    
                            @error('googleplus')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Wikipedia</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('wikipedia') is-invalid @enderror" id="wikipedia" name="wikipedia" value="{{$socialLinks->wikipedia}}" >
                        
                        
                            @error('wikipedia')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Youtube:</label>
                        <div class="col-sm-9">
                       
                            <input type="text"  class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{$socialLinks->youtube}}" >
                       
                            @error('youtube')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Pod Cast:</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('podcast') is-invalid @enderror" id="podcast" name="podcast" value="{{$socialLinks->podcast}}" >
                      
                            @error('podcast')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                      
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="com1" class="col-sm-3 text-end control-label col-form-label">Rss</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control @error('rss') is-invalid @enderror" id="rss" name="rss" value="{{$socialLinks->rss}}" >
                       
                            @error('rss')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                       
                        </div>
                    </div>

            
              
            
                </div>
                <div class="p-3 border-top">
                    <div class="text-end">
                        <input type="hidden" name="id" value="1" >
                        <button type="submit" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Update</button>
               </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>

        $(function() {

     @if (Session::has('message')) 
         toastr.success('{{ Session::get('message') }}', 'Success');
         @endif
            


         });
    
</script>

@endsection