<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Batch;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('pages.lesson.course.index', compact('courses'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $batch_data = Batch::all();
        
        $teacher_data = Teacher::all(); 
        return view('pages.lesson.course.create', compact('batch_data', 'teacher_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'batch_id' => 'required',
            'teacher_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        Course::create($request->all());
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('pages.lesson.course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $batch_data = Batch::all();
        $teacher_data = Teacher::all(); 
        return view('pages.lesson.course.edit', compact('course' , 'batch_data' , 'teacher_data'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'batch_id' => 'required',
            'teacher_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        // Retrieve the batch data
        $course->update($request->all());

        return redirect()->route('course.index')->with('success', 'Course updated successfully');
    }
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course deleted successfully');
    }
}
