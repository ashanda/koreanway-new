<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Batch;
use App\Models\UserCourse;
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
        return view('pages.lesson.course.edit', compact('course', 'batch_data', 'teacher_data'));
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


    public function fetchCourses(Request $request)
    {
        $studentId = $request->input('student_id');

        // Fetch the related courses based on the student ID
        $courses = UserCourse::where('user_id', $studentId)->get();

        // Generate the HTML for the course options
        $uniqueCourseIds = [];
        $options = '';

        foreach ($courses as $course) {
            if (!isset($uniqueCourseIds[$course->course_id])) {
                $options .= '<option value="' . $course->course_id . '" data-user-id="' . $course->user_id . '" data-teacher-id="' . getCourseData($course->course_id)->teacher_id . '">' . getCourseData($course->course_id)->name . '</option>';
                $uniqueCourseIds[$course->course_id] = true;
            }
        }
        $options = '<option value="">Select a course</option>' . $options;
        // Return the generated HTML as the response
        return $options;
    }


    public function getCourseData($course_id)
    {
        try {
            $course = Course::where('id', $course_id)->first();

            if ($course) {
                $courseName = $course->name;
                return response()->json(['name' => $courseName]);
            } else {
                return response()->json(['error' => 'Course not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve course data'], 500);
        }
    }
}
