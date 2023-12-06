@extends('admin.layout.layout')



@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lesson Details</h1>

    </div>

    
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div> 
    @endif


    <!-- lesson Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">lessons Title :</h6>
        </div>
        <div class="card-body">


            <table class="table">
                <tr>
                    <th>Lession Title :</th>
                    <td> {{ $lesson->title }} </td>
                </tr>
                <tr>
                    <th>Course :</th>
                    <td> {{ $lesson->course_id }} </td>
                </tr>
                <tr>
                    <th>Description :</th>
                    <td> {{ $lesson->description }} </td>
                </tr>

                
                <tr>
                    <th>Action</th>
                    <td>

                        <form method="POST" action="{{url('admin/lessons/' . $lesson->id)}}">
                            @csrf
                            
                            @method('delete')
                            
                            <a href="{{url('admin/lessons/' . $lesson->id .'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"> Delete </button>
                        </form>
            
                    </td>
                </tr>

            </table>
        </div>
    </div>
        @endsection
