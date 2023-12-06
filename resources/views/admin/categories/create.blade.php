@extends('admin.layout.layout')




@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add new Category</h1>

    </div>


    <div class="row clearfix">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form action="{{ url('admin/categories') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control
                    @error('name') is-invalid @enderror "
                        name="name" id="name" placeholder="Enter Category" >

                    @error('name')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
