@extends('admin.layout.layout')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">lessons</h1>
        <a href="{{ url('admin/lessons/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add lessons </a>
    </div>


    @isset($message)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div> 
    @endisset

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lessions List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Course_id</th>
                            <th>Date</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Course_id</th>
                            <th>Date</th>
                            <th>Actions</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->id}}</td>
                                <td>{{$lesson->title}}</td>
                                <td>{{$lesson->course_id}}</td>
                                <td>{{$lesson->created_at}}</td>
                                <td>
                                    <form method="POST" action="{{url('admin/lessons/' . $lesson->id)}}">
                                        @csrf
                                        
                                        @method('delete')
                                        
                                        <a href="{{url('admin/lessons/' . $lesson->id)}}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{url('admin/lessons/' . $lesson->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
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


