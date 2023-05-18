<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
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
        return view('auth.student.register');
    }

    public function Studentregister(Request $request)
    {
        
        $request->validate([
            'stnumber' => 'required|string',
            'email' => 'required|email|max:250|unique:students',
            'fullname' => 'required|string|max:250',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'school' => 'required|string|max:250',
            'district' => 'required|string|max:250',
            'town' => 'required|string|max:250',
            'pcontactnumber' => 'required|digits:10',
            'contactnumber' => 'required|digits:10',
            'address' => 'required|string|max:250',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'password' => 'required|min:8|confirmed'
        ]);
        dd('Please');
        DB::table('lmsregister')->insert([
            'stnumber' => $request->stnumber,
            'email' => $request->email,
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'school' => $request->school,
            'district' => $request->district,
            'town' => $request->town,
            'pcontactnumber' => $request->pcontactnumber,
            'contactnumber' => $request->contactnumber,
            'address' => $request->address,
            'image' => $request->image,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $credentials = $request->only('contactnumber', 'password');
        Auth::attempt($credentials);
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
