@extends('admin.layout.layout')



@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses Details</h1>

    </div>

    
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div> 
    @endif


    <!-- Course Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Courses Details</h6>
        </div>
        <div class="card-body">


            <table class="table">
                <tr>
                    <th>Title</th>
                    <td> {{ $course->title }} </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td> {{ $course->category->name }} </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td> {{ $course->description }} </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        @if ($course->photo)
                            <img width="50" src="{{ $course->photo }}" >
                        @endif
                    </td>
                </tr>
                
                <tr>
                    <th>Action</th>
                    <td>

                        <form method="POST" action="{{url('admin/courses/' . $course->id)}}">
                            @csrf
                            
                            @method('delete')
                            
                            <a href="{{url('admin/courses/' . $course->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"> Delete </button>
                        </form>
            
                    </td>
                </tr>

            </table>
        </div>
    </div>
        @endsection
