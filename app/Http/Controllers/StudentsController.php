<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Lesson;
use App\Models\LessonDetail;
use App\Models\Student;
use App\Models\Course;
use App\Models\Batch;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Crypt;
class StudentsController extends Controller
{
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('contactnumber', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard (){
        return view('student.pages.dashboard');
    }


    public function smartClass(){
        if(Auth::guard('student')->check()){
            $StudentCourses = UserCourse::where('user_id', Auth::user()->id)->get();
            $StudentCoursesCount = $StudentCourses->count();
            
            $StudentLessonDetails = LessonDetail::all();
            $StudentLessonDetailsCount = $StudentLessonDetails->count();


            
            $filteredLessons = collect();
            if( $StudentCoursesCount > $StudentLessonDetailsCount){

                foreach($StudentCourses as $StudetCourse){
                    $matchingLesson = $StudentLessonDetails->where('course_id', $StudetCourse->course_id)
                    ->where('batch_id', $StudetCourse->batch_id)
                    ->first();
            
                if ($matchingLesson) {
                    $filteredLessons->push($matchingLesson);
                }
    
                }

            }else if( $StudentCoursesCount < $StudentLessonDetailsCount){

                foreach ($StudentCourses as $StudentCourse) {
                    $matchingLessons = $StudentLessonDetails->where('course_id', $StudentCourse->course_id)
                                                           ->where('batch_id', $StudentCourse->batch_id);
                
                    if ($matchingLessons->isNotEmpty()) {
                        $matchingLessons->each(function ($lesson) use ($filteredLessons) {
                            $filteredLessons->push($lesson);
                        });
                    }
                }
                

            }else{

                foreach($StudentCourses as $StudetCourse){
                    $matchingLesson = $StudentLessonDetails->where('course_id', $StudetCourse->course_id)
                    ->where('batch_id', $StudetCourse->batch_id)
                    ->first();
            
                if ($matchingLesson) {
                    $filteredLessons->push($matchingLesson);
                }
    
                }
            }    
            
            $currentPage = request()->get('page', 1);
            $perPage = 5;
            $total = $filteredLessons->count();
            $lessons = $filteredLessons->forPage($currentPage, $perPage);
          
            $lessonsPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
                $lessons,
                $total,
                $perPage,
                $currentPage,
                ['path' => request()->url()]
            );
            
            return view('pages.student.smart-class', compact('lessonsPaginated'));
            
        }
    }

    public function profile(){
        $student = Student::where('id', '=', Auth::user()->id)->first();
        $courses = Course::all();
        $batches = Batch::all();
        return view('pages.student.profile',compact('student','courses','batches'));
        
    }

    public function investment(){
        return view('pages.student.investment');
    }


   public function smartClassData(Request $request, $encryptedLessonid ){
    $decryptedData = decrypt($encryptedLessonid);
    $id = $decryptedData['id'];
    $LessonDetails = LessonDetail::where('id', $id)->get();

   
     return view('pages.student.smart-class-view', compact('LessonDetails'));

   }
}
