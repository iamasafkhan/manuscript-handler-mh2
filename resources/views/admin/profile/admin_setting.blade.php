
@extends('layouts.admin')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ route('adminprofilesetting.update', $adminprofile->id) }}">

@method('put')
@csrf
<center class="mt-4"> <img src="{{ asset('storage/AdminProfile/images/' . $adminprofile->image) }}" class="rounded-circle" width="150" /></center>
<br><br>
<div class="row">
    <div class="col-4 col-md-6">
        <label>Full Name </label>
        <input type="text" name="name" class="form-control" placeholder="Frist Name" value="{{ $adminprofile->name }}">
    </div>

   



   <div class="col-4 col-md-6">
    <label class="control-label ">Profile Picture</label>
        <input type="file" name="image" class="form-control" placeholder="image" />

   

   </div>

   

    

</div>


<div class="modal-footer">
    <button type="submit" class="btn btn-light-success  ">Update</button>
 
</div>
<input type="hidden" name="id" value="{{ $adminprofile->id }}">
</form>



@endsection



