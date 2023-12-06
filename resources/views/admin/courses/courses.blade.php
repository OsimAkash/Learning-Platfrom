@extends('admin.layout.layout')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1>
        <a href="{{ url('admin/courses/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Courses </a>
    </div>


    @isset($message)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div> 
    @endisset

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->category->name}}</td>
                                <td>{{$course->created_at}}</td>
                                <td>
                                    <form method="POST" action="{{url('admin/courses/' . $course->id)}}">
                                        @csrf
                                        
                                        @method('delete')
                                        
                                        <a href="{{url('admin/courses/' . $course->id)}}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{url('admin/courses/' . $course->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"> Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


