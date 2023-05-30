<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Course;
use RealRashid\SweetAlert\Facades\Alert;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Notification::all();
        return view('pages.messages.index', compact('messages'));
    }

    public function create()
    {
        $courses = Course::where('status', 'Publish')->get();
        return view('pages.messages.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $message = new Notification;
        $message->title = $request->input('title');
        $message->course_id = $request->input('course');
        $message->batch_id = $request->input('batch');
        $message->message = $request->input('message');
       
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/notice/img'), $filename);
            $message->image = $filename;
            $message->save();
        }
        
        Alert::success('Success', 'Your message has been successfully saved.'); 
        return redirect()->route('messages.index');
    }

    public function show(Notification $message)
    {
        return view('pages.messages.show', compact('message'));
    }

    public function edit(Notification $message)
    {
        return view('pages.messages.edit', compact('message'));
    }

    public function update(Request $request, Notification $message)
    {
        $message->title = $request->input('title');
        $message->course_id = $request->input('course_id');
        $message->batch_id = $request->input('batch_id');
        $message->message = $request->input('message');
        $message->status = $request->input('status');
        $message->save();
        Alert::success('Success', 'Your message has been updated'); 
        return redirect()->route('messages.index');
    }

    public function destroy(Notification $message)
    {
        $message->delete();
        Alert::success('Success', 'Your message has been Deleted'); 
        return redirect()->route('messages.index');
    }
}
