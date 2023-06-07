<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function dashboard()
    {
        return view('teacher');
    }
    public function index()
    {
        $teachers = Teacher::latest()->paginate(5);
        return view('pages.teacher.index', compact('teachers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pages.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $teacher = Teacher::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // Teacher::create($request->all());    

        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully.');
    }

    public function show(Teacher $teacher)
    {
        return view('pages.teacher.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('pages.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $teacher->name = $request['name'];
        $teacher->email = $request['email'];
        // if ($request->filled('password')) {
        //     $teacher->password = encrypt($request['password']);
        // }
        $teacher->save();

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully');
    }
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully');
    }


    public function getTeacherData($teacher_id)
    {
        try {
            $teacher = Teacher::find($teacher_id);

            if ($teacher) {
                $teacherName = $teacher->name;
                return response()->json(['name' => $teacherName]);
            } else {
                return response()->json(['error' => 'Teacher not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve teacher data'], 500);
        }
    }
}