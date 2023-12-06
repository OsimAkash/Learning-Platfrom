<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->data['lessons']       = Lesson::all();
        if (Session::has('message')) {
            $this->data['message']   = Session::get('message');
        }
        return view('admin.lessons.lessons', $this->data);
    }
    

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['lesson'] = new Lesson();
        $this->data['lessons'] = Course::all();

        return view('admin.lessons.lesson_form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        $data = $request->all();
        // $data['user_id'] = Auth::id();



        $lesson =  Lesson::create($data);

        Session::flash('massage', 'lessons Added Successfully');

        return redirect()->to('admin/lessons');
    }


        /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $this->data['lesson'] = Lesson::findOrFail($id);

        // dd($this->data['lesson']);

        return view('admin.lessons.show', $this->data);
    }


        /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $this->data['lessons']  = lesson::all();
        $this->data['lesson']      = $lesson;





        return view('admin.lessons.lesson_form', $this->data);
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {

        $data = $request->all();
        $lesson->title = $data['title'];
        $lesson->description = $data['description'];
        $lesson->course_id = $data['course_id'];
        $lesson->video_url = $data['video_url'];


        $lesson->save();

        Session::flash('massage', 'Lesson Updated Successfully');

        return redirect()->to('admin/lessons/' . $lesson->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lesson $lesson)
    {


        $lesson->delete();

        Session::flash('massage', 'lessons Deleted Successfully');

        return redirect()->to('admin/lessons');
    }

}
