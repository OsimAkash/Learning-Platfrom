@extends('admin.layout.layout')




@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add new Courses</h1>

    </div>


    <div class="row clearfix">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form action="{{ url('admin/courses/' . $course->id) }}" method="POST" enctype="multipart/form-data" >
                @if($course->id)

                @method('PUT')

                @endif
                
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Course Title</label>
                    <input type="text" class="form-control
                    @error('title') is-invalid @enderror "
                        name="title" id="title" placeholder="Enter Courses Title"
                        value="{{ old('title', $course->title) }}"
                        >
                    @error('title')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror

                </div>






                <div class="form-group">
                    <label for="category_id" class="form-label">Course Category</label>

                    <select name="category_id" id=""
                        class="form-control
                    @error('category_id') is-invalid @enderror ">
                    <option  value="">Select Category</option>

                    @foreach ($categories as $category)

                    <option value="{{$category->id}}" @if ( $category->id == old('category_id', $course->category_id )) selected @endif  > {{$category->name}} </option>                    
                    @endforeach

                    </select>
                    @error('category_id')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea class="form-control
                                    @error('description') is-invalid @enderror "
                        name="description" id="description" cols="30" rows="10"
                       
                        >{{ old('description', $course->description ) }}</textarea>

                    @error('description')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" >Course Photo</label>
                    
                    
                    <input type="file" class="form-control
                    @error('photo') is-invalid @enderror "
                    name="photo" id="photo" placeholder="Enter Course photo" 
                    >
                    
                    @error('photo')
                    <small class="text-danger"> {{ $message }} </small>
                    @enderror

                    @if ($course->photo)  
                        <img src="{{$course->photo}}" alt="">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
