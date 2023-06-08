<?php

namespace App\Http\Controllers;

use App\Models\Mcq;
use App\Models\Question;
use Illuminate\Http\Request;

class McqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Mcq::all();
        return view('pages.exam.mcq.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.exam.mcq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validate the form data
           $validatedData = $request->validate([
            'lms_exam_name' => 'required|string',
            'lms_exam_time_duration' => 'required|numeric',
            'lms_exam_question' => 'required|numeric',
        ]);

        // Create a new MCQExam instance
        $mcqExam = new Mcq;
        $mcqExam->title = $validatedData['lms_exam_name'];
        $mcqExam->exam_time_duration = $validatedData['lms_exam_time_duration'];
        $mcqExam->exam_question = $validatedData['lms_exam_question'];

        // Save the MCQExam instance
        $mcqExam->save();

        // Redirect to a success page or perform any other actions
        return redirect()->route('mcq-exams.index')->with('success', 'Exam added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $exam = Mcq::find($id);
        $questions = Question::where('exam_id',$exam->id)->get();
        return view('pages.exam.mcq.show', compact('exam','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
   
    {
        $exam = Mcq::find($id);
        return view('pages.exam.mcq.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $exam = Mcq::findOrFail($id);
            // Update the exam object with the submitted form data
            $exam->title = $request->input('lms_exam_name');
            $exam->exam_time_duration = $request->input('lms_exam_time_duration');
            $exam->exam_question = $request->input('lms_exam_question');
            // Save the updated exam object
            $exam->save();
            // Redirect back to the exam view or any other appropriate page
            return redirect()->back()->with('success', 'Exam updated successfully.');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // Retrieve the exam object from the database
        $exam = Mcq::findOrFail($id);

        // Delete the exam
        $exam->delete();

        // Redirect back to the exam view or any other appropriate page
        return redirect()->back()->with('success', 'Exam deleted successfully.');
    }

    public function add_question(Request $request, $id){
        $exam = Mcq::find($id);
        $question_count = Question::where('exam_id',$exam->id)->count();
        return view('pages.exam.mcq.add-question', compact('exam','question_count'));
    }

    public function add_question_db(Request $request)
{
    $validatedData = $request->validate([
        'exam_id' => 'required',
        'question' => 'required',
        'ans_1' => 'required',
        'ans_2' => 'required',
        'ans_3' => 'required',
        'ans_4' => 'required',
        'ans' => 'required',
    ]);

    // Create a new Question object and set its properties
    $question = new Question();
    $question->exam_id = $validatedData['exam_id'];
    $question->descriptions = $validatedData['question'];
    $question->q1 = $validatedData['ans_1'];
    $question->q2 = $validatedData['ans_2'];
    $question->q3 = $validatedData['ans_3'];
    $question->q4 = $validatedData['ans_4'];
    $question->answer = $validatedData['ans'];
    $question->resourse = '';

    if ($request->file('document')) {
        $file = $request->file('document');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('/mcq'), $filename);
        $question->resourse = $filename;
    }

    // Save the new question to the database
    $question->save();

    // Redirect back to the form or any other appropriate page
    return redirect()->back()->with('success', 'Question added successfully.');
}

public function mcq(Request $request, $id){
    $exam = Mcq::find($id);
    $questions = Question::where('exam_id',$exam->id)->get();
    return view('pages.student.exam', compact('exam','questions'));
}

}
