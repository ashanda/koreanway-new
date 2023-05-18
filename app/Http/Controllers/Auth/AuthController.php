<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
     // -------------------Student------------------------//
    public function StudentshowLoginForm()
    {
        return view('auth.student.login');
    }

    public function StudentLogin(Request $request)
    {
        $credentials = $request->only('contactnumber', 'password');
       
        if (Auth::guard('student')->attempt($credentials)) {
            
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function StudentshowRegisterForm()
    {
        $courses = Course::where('status', 'Publish')->get();
        return view('auth.student.register' ,compact('courses'));
    }

    public function Studentregister(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'stnumber' => 'required',
            'email' => 'required|email',
            'fullname' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'district' => 'required',
            'town' => 'required',
            'contactnumber' => 'required',
            'address' => 'required',
            'course' => 'required',
            'batch' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, store the data
        $student = new Student([
            'stnumber' => $request->input('stnumber'),
            'email' => $request->input('email'),
            'fullname' => $request->input('fullname'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'district' => $request->input('district'),
            'town' => $request->input('town'),
            'contactnumber' => $request->input('contactnumber'),
            'address' => $request->input('address'),
            'course_id' => $request->input('course'),
            'batch_id' => $request->input('batch'),
            'password' => bcrypt($request->input('password')),
        ]);

        $student->save();

        $credentials = $request->only('contactnumber', 'password');
        Auth::guard('student')->attempt($credentials);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    // -------------------Teacher------------------------//
    public function TeachershowLoginForm()
    {
        return view('auth.teacher.login');
    }

    public function TeacherLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
       
        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect()->intended('/teacher/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ]);
    }


     // -------------------Admin------------------------//
     public function AdminshowLoginForm()
    {
        return view('auth.admin.login');
    }

    public function AdminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
     
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard (){
        return view('pages.dashboard');
    }


    public function studentLogout(Request $request)
{
    Auth::guard('student')->logout();

    $request->session()->invalidate();
    

    return redirect()->route('student_login');
}

public function teacherLogout(Request $request)
{
    Auth::guard('teacher')->logout();

    $request->session()->invalidate();
    

    return redirect()->route('teacher_login');
}

public function adminLogout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    

    return redirect()->route('admin_login');
}


}
