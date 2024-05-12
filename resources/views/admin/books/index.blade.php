@extends('admin.layouts.app')
@section('title','Book List')
@section('content')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">
        @include('admin.common.success-message')
        @include('admin.common.error-message')
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Books</h4>
                </div>
                <div class="col-lg-6 text-end">
                    <a class="btn btn-success" href="{{ route('books.create') }}">
                        Create Book
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="books-datatable" class="table dt-responsive  w-100">
                            <thead>
                                <tr>
                                    <th>Idx</th>
                                    <th>Book Name</th>
                                    <th>Content Owner</th>
                                    <th>Publisher</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>
                                    {{ $loop->iteration ?? '' }}
                                </td>
                                <td>
                                    {{$book->bookname}}
                                </td>
                                <td>
                                    {{$book->content_owner->name}}
                                </td>
                                <td>
                                    {{$book->publisher->name}}
                                </td>
                                <td>
                                    {{date('Y-m-d',strtotime($book->created_timetick))}}
                                </td>
                                <td class="text-nowrap">
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        href="{{ route('books.edit', $book->idx) }}">
                                        <span class="mdi mdi-square-edit-outline"></span>
                                    </a>
                                    <form id="deleteForm" class="deleteForm" 
                                        action="{{ route('books.destroy', $book->idx) }}" method="POST"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;"
                                            class=" p-0 glow" value="DELETE">
                                        <button
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                            class="p-0 glow" type="submit">
                                            <span class="mdi mdi-delete"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->

</div> 
@endsection
@section('js')
<script>
  var table = new DataTable("#books-datatable");
  $(".deleteForm").on("submit", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteForm').unbind('submit').submit();
            }
            });
    });
</script>
@endsection