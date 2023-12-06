@extends('forntend.layout.forntend')



@section('content')
    <div class="page-header">

        <div class="container">
            <h1> {{ $course->title }} </h1>
        </div>
    </div>

    <div class="course-descriptions">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-4">
                    <img class="img-fluid" height="" src="{{ Storage::url($course->photo) }}" alt="{{ $course->title }}">
                </div>
                <div class="col-md-8">
                    <h2>{{ $course->title }}</h2>
                    {{ $course->description }}
                    <div class="course-lesson mt-5">
                        <h2>Lessons</h2>
                        <ol>
                            @foreach ($course->lessons as $lesson)
                                <li><a href="{{ route('lessons.details', ['lesson' => $lesson->id, 'slug' =>Str::slug($lesson->title)]) }}"
                                        class="nav-link "> {{ $lesson->title }} </a></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
