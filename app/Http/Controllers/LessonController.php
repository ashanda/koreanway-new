<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Batch;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\LessonDetail;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lessons = LessonDetail::latest()->paginate(5);
        
        // $type = $request->query('lessontype');

        // if ($type == 'free-live-today') {
        //     $lessons = Lesson::where('classtype', 'live')->where('paytype', 'Free')->where('published_date', '<=', now()->toDateString())->latest()->paginate(5);

        // }elseif ($type == 'free-live-next-day') {
        //     $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->where('published_date', '>', now()->toDateString())->latest()->paginate(5);

        // } elseif ($type == 'free-paper-this-month') {
        //     $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->paginate(5);

        // } elseif ($type == 'free-paper-previous-month') {
        //     $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }elseif ($type == 'free-video-this-month') {
        //     $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }elseif ($type == 'free-video-previous-month') {
        //     $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->paginate(5);

        // } elseif ($type == 'paid-live-today') {
        //     $lessons = Lesson::where('classtype', 'live')->where('paytype', 'Paid')->where('published_date', '<=', now()->toDateString())->latest()->paginate(5);

        // }elseif ($type == 'paid-live-next-day') {
        //     $lessons = Lesson::where('classtype', 'live')->where('paytype', 'Paid')->where('published_date', '>', now()->toDateString())->latest()->paginate(5);

        // } elseif ($type == 'paid-paper-this-month') {
        //     $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }elseif ($type == 'paid-paper-previous-month') {
        //     $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }elseif ($type == 'paid-video-this-month') {
        //     $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }elseif ($type == 'paid-video-previous-month') {
        //     $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->paginate(5);

        // }

        // return view('pages.lesson.index', compact('lessons', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
        return view('pages.lesson.index', compact('lessons'))->with('i', (request()->input('page', 1) - 1) * 5);
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
           
        
        // if ($request->input('is_live_lesson') === '1') {
        //     $lesson = new Lesson();
        //     $lesson->lesson_id = $request->input('lesson_id');
        //     $lesson->title = $request->input('live_title');
        //     $lesson->classtype = $request->input('live');
        //     $lesson->paytype = $request->input('paytype-live');
        //     $lesson->link = $request->input('link-live');
        //     $lesson->password = $request->input('password-live');
        //     $lesson->save();
            
        // }
        // if ($request->input('is_video_lesson') === '1'){
        //     $lesson = new Lesson();
        //     $lesson->lesson_id = $request->input('lesson_id');
        //     $lesson->title = $request->input('title-video');
        //     $lesson->classtype = $request->input('video');
        //     $lesson->paytype = $request->input('paytype-video');
        //     $lesson->available_days = $request->input('available_days-video');
        //     $lesson->no_of_views = $request->input('no_of_views-video');
        //     $lesson->save(); 

        // }
        // if ($request->input('is_paper_lesson') === '1') {
        //     $lesson = new Lesson();
        //     $lesson->lesson_id = $request->input('lesson_id');
        //     $lesson->title = $request->input('title-paper');
        //     $lesson->classtype = $request->input('lesson-type-paper');
        //     $lesson->paytype = $request->input('paytype-paper');

        //     $lesson->teacher_id = $request->input('lesson-live');
        //     $lesson->batch_id = $request->input('link-live');
        //     $lesson->course_id = $request->input('password-live');

        //     if ($request->file('doc')) {
        //         $file = $request->file('doc');
        //         $filename = date('YmdHi') . $file->getClientOriginalName();
        //         $file->move(public_path('/lesson/doc'), $filename);
        //         $lesson->doc = $filename;
        //         $lesson->save();
        //     }


        // }

        $lessonDetails = new LessonDetail();
        $lessonDetails->lesson_id = $request->input('lesson_id');
        $lessonDetails->title = $request->input('lesson_title');
        $lessonDetails->published_date = $request->input('published_date-live');
        $lessonDetails->teacher_id = $request->input('teacher_id-live');
        $lessonDetails->batch_id = $request->input('batch_id-live');
        $lessonDetails->course_id = $request->input('course_id-live');    
        $lessonDetails->status = $request->input('status-live');
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/lesson/img'), $filename);
            $lessonDetails->image = $filename;
            $lessonDetails->save();
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


    public function lesson(Request $request ,$lessontype)
    {
        
        if(Auth::guard('student')->check()){
        
        if ($lessontype == 'free-live-today') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', '=', 'Free')->where('published_date', '=', now()->toDateString())->latest()->get();
            $lessons =  getUserCourseData($lessons);
            
        }elseif ($lessontype == 'free-live-next-day') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Free')->where('published_date', '>', now()->toDateString())->latest()->get();
            $lessons =  getUserCourseData($lessons);
       
        } elseif ($lessontype == 'free-paper-this-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        } elseif ($lessontype == 'free-paper-previous-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
       
        }elseif ($lessontype == 'free-video-this-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        
        }elseif ($lessontype == 'free-video-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        
        } elseif ($lessontype == 'paid-live-today') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', now()->toDateString())->latest()->get();
            $lessons =  getUserCourseData($lessons);

        }elseif ($lessontype == 'paid-live-next-day') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', '>', now()->toDateString())->latest()->get();
            $lessons =  getUserCourseData($lessons); 
        } elseif ($lessontype == 'paid-paper-this-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        }elseif ($lessontype == 'paid-paper-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        }elseif ($lessontype == 'paid-video-this-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
            $lessons =  getUserCourseData($lessons);
        }elseif ($lessontype == 'paid-video-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->where(function ($query) {
                $query->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])
                      ->orWhereDate('published_date', '<', now()->format('Y-m-d'));
            })->latest()->get();
           
            $lessons =  getUserCourseData($lessons);
           
        }

    }else{
        if ($lessontype == 'free-live-today') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', '=', 'Free')->where('published_date', '=', now()->toDateString())->where('teacher_id','=',Auth::user()->id)->latest() ->paginate(5);
            
        }elseif ($lessontype == 'free-live-next-day') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Free')->where('published_date', '>', now()->toDateString())->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        } elseif ($lessontype == 'free-paper-this-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        } elseif ($lessontype == 'free-paper-previous-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }elseif ($lessontype == 'free-video-this-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }elseif ($lessontype == 'free-video-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        } elseif ($lessontype == 'paid-live-today') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', '=', now()->toDateString())->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);
            

        }elseif ($lessontype == 'paid-live-next-day') {
            $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', '>', now()->toDateString())->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        } elseif ($lessontype == 'paid-paper-this-month') {
            $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }elseif ($lessontype == 'paid-paper-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }elseif ($lessontype == 'paid-video-this-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }elseif ($lessontype == 'paid-video-previous-month') {
            $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") < ?', [now()->format('Y-m')])->where('teacher_id','=',Auth::user()->id)->latest()->paginate(5);

        }

    }
        

        return view('pages.lesson.index', compact('lessons','lessontype'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function singleLesson(Request $request, $lessontype, $id)
    {
        $lessontype = Crypt::decrypt($lessontype);
        $id = Crypt::decrypt($id);
        
        
        // Rest of your code...
    }



public function filter(Request $request,$lessontype)
{
    $s_month = $request->input('s_month');
    $e_month = $request->input('e_month');

    if ($lessontype == 'free-live-today') {
        $lessons = Lesson::where('classtype', 'Live')->where('paytype', '=', 'Free')->where('published_date', '=', now()->toDateString())->latest()->get();
        $lessons =  getUserCourseData($lessons);
        
    }elseif ($lessontype == 'free-live-next-day') {
        $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Free')->where('published_date', '>', now()->toDateString())->latest()->get();
        $lessons =  getUserCourseData($lessons);
   
    } elseif ($lessontype == 'free-paper-this-month') {
        $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    } elseif ($lessontype == 'free-paper-previous-month') {
        $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Free')->whereBetween('published_date', [$s_month, $e_month])->latest()->get();
        $lessons =  getUserCourseData($lessons);
   
    }elseif ($lessontype == 'free-video-this-month') {
        $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    
    }elseif ($lessontype == 'free-video-previous-month') {
        $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Free')->whereBetween('published_date', [$s_month, $e_month])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    
    } elseif ($lessontype == 'paid-live-today') {
        $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', now()->toDateString())->latest()->get();
        $lessons =  getUserCourseData($lessons);

    }elseif ($lessontype == 'paid-live-next-day') {
        $lessons = Lesson::where('classtype', 'Live')->where('paytype', 'Paid')->where('published_date', '>', now()->toDateString())->latest()->get();
        $lessons =  getUserCourseData($lessons); 
    } elseif ($lessontype == 'paid-paper-this-month') {
        $lessons = Lesson::where('classtype', 'paper')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    }elseif ($lessontype == 'paid-paper-previous-month') {
        $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereBetween('published_date', [$s_month, $e_month])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    }elseif ($lessontype == 'paid-video-this-month') {
        $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereRaw('DATE_FORMAT(published_date, "%Y-%m") = ?', [now()->format('Y-m')])->latest()->get();
        $lessons =  getUserCourseData($lessons);
    }elseif ($lessontype == 'paid-video-previous-month') {
        $lessons = Lesson::where('classtype', 'video')->where('paytype', 'Paid')->whereBetween('published_date', [$s_month, $e_month])->latest()->get();
        
        $lessons =  getUserCourseData($lessons);
      
    }
    return view('pages.lesson.index', compact('lessons','lessontype'))->with('i', (request()->input('page', 1) - 1) * 5);
}



}