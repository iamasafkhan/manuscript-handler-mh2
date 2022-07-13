@extends('layouts.admin')

@section('title', 'content')

@section('content')





@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('contentmanagement.create') }}" class="btn btn-success" style="margin-left: 15px;">Add Content Pages</a>
    </li>
</ol>




        

<div class="row">
    <div>
        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle" id="contentID" > 
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Heading</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @foreach ($pagecontent as $pagecontent)
                    <tr>
                        <td>{{ $pagecontent->id }}</td>
                        <td>{{ $pagecontent->page_title }}</td>
                        <td>{{ $pagecontent->page_heading }}</td>
                        <td>{{ $pagecontent->page_url }}</td>
                        <td>{{ $pagecontent->status }}



                            @if($pagecontent->status =='1')

                            <a alt="alert" class="img-fluid model_img" id="sa-confirm1"  href="{{ route('contentmanagement.unactive', ['id' => $pagecontent->id])  }}" style="color:success;" >Active</a>

                            @else

                            <a alt="alert" class="img-fluid model_img" id="sa-confirm2"  href="{{ route('contentmanagement.active', ['id' => $pagecontent->id]) }}" style="color:red;" >InActive</a>
                            
                            @endif

                        </td>

                        <td>
                            <a href="{{ route('contentmanagement.edit', $pagecontent->id) }}" class="fas fa-pen">Edit</a>

                            <form action="{{ route('contentmanagement.destroy', $pagecontent->id) }}" method="post">

                                @csrf
                                @method('delete')
                                <button onclick="return window.confirm('Are You Sure to Delete This Content?');" type="submit" class="btn btn-outline-danger">Delete</button>

                            </form>
                        </td>
                    </tr>

                    @endforeach


                    </form>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script>

$(document).ready( function () {
    $('#contentID').DataTable();
} );
    </script> 

    <script>







    $(document).on('click', '.SwalBtn1', function() {
        //Some code 1
        console.log('Button 1');
        swal.clickConfirm();
    });
    $(document).on('click', '.SwalBtn2', function() {
        //Some code 2 
        console.log('Button 2');
        swal.clickConfirm();
    });

$('#ShowBtn').click(function(){
    swal({
        title: 'Title',
        html: "Some Text" +
            "<br>" +
            '<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">' + 'Button1' + '</button>' +
            '<button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn">' + 'Button2' + '</button>',
        showCancelButton: false,
        showConfirmButton: false
    });
 });













 


</script>


    @endsection