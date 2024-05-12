@extends('admin.layouts.app')
@section('title', 'Book List')
@section('content')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">
            @include('admin.common.error-message')
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">New Book</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('books.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="form-group my-2">
                                                    <label class="required"
                                                        for="name">Book Name <span class="text-danger">*</span></label>
                                                    <input
                                                        class="form-control @error('bookname') is-invalid @enderror"
                                                        type="text" name="bookname" 
                                                        value="{{ old('bookname', '') }}" required>
                                                    @error('bookname')
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('bookname') }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="form-group my-2">
                                                    <label class="required"
                                                        for="price">Price <span class="text-danger">*</span></label>
                                                    <input
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        type="number" name="price" 
                                                        value="{{ old('price', '') }}" required>
                                                    @error('price')
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('price') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="form-select my-2">
                                                    <label class="required"
                                                        for="publisher_id">Publisher <span class="text-danger">*</span></label>
                                                    <select class="form-control @error('publisher_id') is-invalid @enderror " name="publisher_id" required>
                                                        <option>-- Select --</option>
                                                        @foreach($publishers as $publisher)
                                                            <option value="{{$publisher->idx}}" @if(old('publisher_id') == $publisher->idx) selected @endif>{{$publisher->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('publisher_id')
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('publisher_id') }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="form-select my-2">
                                                    <label class="required"
                                                        for="address">Content Owner <span class="text-danger">*</span></label>
                                                    <select class="form-control @error('co_id') is-invalid @enderror" name="co_id" required>
                                                        <option>-- Select --</option>
                                                        @foreach($content_owners as $co)
                                                            <option value="{{$co->idx}}" @if(old('co_id') == $co->idx) selected @endif>{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('co_id')
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('co_id') }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="form-select my-2">
                                                    <label class="required"
                                                        for="address">Cover Image <span class="text-danger">*</span></label>
                                                    <input class="form-control @error('cover_photo') is-invalid @enderror " type="file" name="cover_photo" id="formFile" onchange="preview()" required>
                                                    @error('cover_photo')
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('cover_photo') }}
                                                        </div>
                                                    @enderror
                                                   
                                                </div>
                                                <div class="mb-3">
                                                    <img id="frame" height="250px" src="" class="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group my-2">
                                            <button class="btn btn-success" type="submit">
                                                Save
                                            </button>
                                            <a href="{{ route('books.index') }}"
                                                class="btn btn-secondary text-white">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection