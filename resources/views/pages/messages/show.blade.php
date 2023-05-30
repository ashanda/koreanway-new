@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h3>Show Notice</h3>
        </div>
    </div>
</div>

<p><strong>Course ID:</strong> {{ $message->course_id }}</p>
<p><strong>Batch ID:</strong> {{ $message->batch_id }}</p>
<p><strong>Message:</strong> {{ $message->message }}</p>

<a href="{{ route('messages.index') }}">Back to Messages</a>