<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\UserHomework;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class UserHomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_data = Student::all();
        $userhomeworks = UserHomework::latest()->get();
        return view('pages.homeworks.index', compact('userhomeworks','student_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $homework = new UserHomework;
        $homework->lesson_id = $request->input('lesson_id');
        $homework->user_id = $request->input('user_id');

        if ($request->file('homeworkFile')) {
            $file = $request->file('homeworkFile');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/lesson/homework'), $filename);
            $homework->document = $filename;
        }
        $homework->save();
        // Show the success message with SweetAlert
        Alert::success('Success', 'Your homework has been successfully uploaded.');

        // Redirect back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(UserHomework $userHomework)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserHomework $userHomework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserHomework $userHomework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserHomework $userHomework)
    {
        //       
    }
}
