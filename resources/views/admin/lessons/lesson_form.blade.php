@extends('admin.layout.layout')




@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add new lesson</h1>
        @if ($lesson->id)
        Update Lesson
        
        @else 

        Add new Lesson
        @endif

    </div>


    <div class="row clearfix">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form action="{{ url('admin/lessons/' . $lesson->id) }}" method="POST" enctype="multipart/form-data" >
                @if($lesson->id)

                @method('PUT')


                @endif
                
                @csrf


                <div class="form-group">
                    <label for="title" class="form-label">lesson List</label>
                    <input type="text" class="form-control
                    @error('title') is-invalid @enderror "
                        name="title" id="title" placeholder="Enter lesson Title"
                        value="{{ old('title', $lesson->title) }}"
                        >
                    @error('title')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror

                </div>






                <div class="form-group">
                    <label for="course_id" class="form-label">lesson course</label>

                    <select name="course_id" id=""
                        class="form-control
                    @error('course_id') is-invalid @enderror ">
                    <option  value="">Select course</option>

                    @foreach ($lessons as $lesson)

                    <option value="{{$lesson->id}}" @if ( $lesson->id == old('course_id', $lesson->course_id )) selected @endif  > {{$lesson->title}} </option>                    
                    @endforeach

                    </select>
                    @error('course_id')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="video_url" class="form-label">lesson Video URL</label>
                    <input type="text" class="form-control
                    @error('video_url') is-invalid @enderror "
                        name="video_url" id="video_url" placeholder="Enter lesson Title"
                        value="{{ old('video_url', $lesson->video_url) }}"
                        >
                    @error('video_url')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="description" class="form-label">lesson Description</label>
                    <textarea class="form-control
                                    @error('description') is-invalid @enderror "
                        name="description" id="description" cols="30" rows="10"
                       
                        >{{ old('description', $lesson->description ) }}</textarea>

                    @error('description')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
