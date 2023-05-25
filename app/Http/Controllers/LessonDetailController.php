<?php

namespace App\Http\Controllers;
use App\Models\LessonDetail;
use Illuminate\Http\Request;

class LessonDetailController extends Controller
{
    public function create(Request $request){
        
        $lessonDetails = new LessonDetail([
            'lesson_id' => $request->input('lesson_id'),
            'title' => $request->input('lesson_title'),
        ]);

        $lessonDetails->save();
    }
}
