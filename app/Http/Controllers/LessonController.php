<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Batch;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lessons = Lesson::latest()->paginate(5);

        $type = $request->query('type');

        if ($type == 'schedule') {
            $lessons = Lesson::where('classtype', 'schedule')->latest()->paginate(5);
        } elseif ($type == 'tute') {
            $lessons = Lesson::where('classtype', 'tute')->latest()->paginate(5);
        } elseif ($type == 'video') {
            $lessons = Lesson::where('classtype', 'video')->latest()->paginate(5);
        }

        return view('pages.lesson.index', compact('lessons', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batch_data = Batch::all();
        $teacher_data = Teacher::all();
        $course_data = Course::all();
        return view('pages.lesson.create', compact('batch_data', 'teacher_data', 'course_data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'classtype' => 'required',
            'paytype' => 'required',
            'teacher_id' => 'required',
            'batch_id' => 'required',
            'course_id' => 'required',
            'image' => 'image|max:2048',
            'doc' => 'file|mimes:doc,pdf,docx'
        ]);

        $lesson = Lesson::create($request->all());

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/img'), $filename);
            $lesson->image = $filename;
            $lesson->save();
        }

        if ($request->file('doc')) {
            $file = $request->file('doc');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/doc'), $filename);
            $lesson->doc = $filename;
            $lesson->save();
        }

        return redirect()->route('lesson.index')->with('success', 'Class created successfully.');
    }

    public function show(Lesson $lesson)
    {
        return view('pages.lesson.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $batch_data = Batch::all();
        $teacher_data = Teacher::all();
        $course_data = Course::all();
        return view('pages.lesson.edit', compact('lesson', 'batch_data', 'teacher_data', 'course_data'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required',
            'classtype' => 'required',
            'paytype' => 'required',
            'teacher_id' => 'required',
            'batch_id' => 'required',
            'course_id' => 'required',
        ]);

        $lesson->update([
            'title' => $request->title,
            'classtype' => $request->classtype,
            'paytype' => $request->paytype,
            'teacher_id' => $request->teacher_id,
            'batch_id' => $request->batch_id,
            'course_id' => $request->course_id,
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/img'), $filename);
            $lesson->image = $filename;
            $lesson->save();
        }

        if ($request->file('doc')) {
            $file = $request->file('doc');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/docs'), $filename);
            $lesson->doc = $filename;
            $lesson->save();
        }

        return redirect()->route('lesson.index')->with('success', 'Class updated successfully');
    }


    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lesson.index')->with('success', 'Class deleted successfully');
    }
}
