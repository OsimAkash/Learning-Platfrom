@extends('forntend.layout.forntend')

@section('content')

<div class="page-header">

    <div class="container">
        <h1>Course List</h1>
    </div>
</div>
    


    <div class="courses">
        <div class="container">
           <div class="row">

                
                @foreach ($courses as $course)
                <div class="col-md-3">
                    
                    <div class="card">
                        <img height="200" src=" {{ Storage::url ($course->photo)}} " class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{$course->title}} </h5>
                            <p class="card-text"> <span class="badge bg-success">  {{$course->category->name}} </span></p>
                            <a href="{{'/courses/' . $course->id}}" class="btn btn-primary">Course Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
            

        </div>
    </div>
@endsection
