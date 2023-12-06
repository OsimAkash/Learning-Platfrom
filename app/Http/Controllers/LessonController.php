<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson, $slug)  {
        
        $this->data['lesson'] = $lesson;
        $this->data['course'] = $lesson->course;

        return \view('forntend.lessons.details', $this->data);

    }
}
