<?php

namespace App\Http\Controllers;
use App\Models\LessonDetail;
use Illuminate\Http\Request;

class LessonDetailController extends Controller
{
    /**public function index(Request $request)
    
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lessons = LessonDetail::latest()->paginate(5);
        // return view('pages.lesson.index', compact('lessons'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $lessonDetails = new LessonDetail([
            'lesson_id' => $request->input('lesson_id'),
            'title' => $request->input('lesson_title'),
        ]);

        $lessonDetails->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
