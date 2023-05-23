<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::latest()->get();
        return view('pages.lesson.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.lesson.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'visible' => 'required',
            'fee' => 'required',
        ]);

        Batch::create($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        return view('pages.lesson.batch.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        return view('pages.lesson.batch.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     
        
        $batch = Batch::find($id);
        // Set other fields as needed
        
        // Save the changes
        $batch->update($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batch.index')->with('success', 'Batch deleted successfully');
    }


    //batch get in selected course
    public function getBatch($courseId)
    {
        $course = Course::find($courseId);
        $batches = Batch::where('id',$course->batch_id)->get();

        return response()->json($batches);
    }


    public function fetchBatches(Request $request)
{
    $courseId = $request->input('course_id');
    $userid = $request->input('user_id');
    // Fetch the related batches based on the course ID
    $batches = UserCourse::where('user_id',$userid)->where('course_id', $courseId)->get();
    // Generate the HTML for the batch options

        $options = '';

        foreach ($batches as $batch) {
   
                $options .= '<option value="' . $batch->batch_id . '">' . getBatchData($batch->batch_id)->name . '</option>';
               
            
        }
  
        $options = '<option value="">Select a batch</option>' . $options;
    // Return the generated HTML as the response
    return $options;
}
}
