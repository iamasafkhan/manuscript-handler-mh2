@extends('layouts.admin')

@section('title', 'newseventsmanagment')

@section('content')


    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('newseventsmanagment.create') }}" class="btn btn-success" style="margin-left: 15px;">Add
                News</a>
        </li>
    </ol>


    <div class="row">
        <div>

            <div class="card">

                <div class="table-responsive">
                    <table class="table customize-table mb-0 v-middle" id="newsID" >
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        @foreach ($newseventsmanagment as $newseventsmanagment)
                            <tr>
                                <td>{{ $newseventsmanagment->id }}</td>
                                <td>{{ $newseventsmanagment->title }}</td>
                                <td>{{ $newseventsmanagment->description }}</td>




                                <td>
                                    <a href="{{ route('newseventsmanagment.edit', $newseventsmanagment->id) }}"
                                        class="fas fa-pen">Edit</a>



                                    <form action="{{ route('newseventsmanagment.destroy', $newseventsmanagment->id) }}"
                                        method="post">

                                        @csrf
                                        @method('delete')
                                        <button onclick="return window.confirm('Are You Sure to Delete This News?');"
                                            type="submit" class="btn btn-outline-danger">Delete</button>

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
            $(document).ready(function() {
                $('#newsID').DataTable();
            });
        </script>



    @endsection
