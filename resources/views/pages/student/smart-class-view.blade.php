@extends('layouts.app')

@section('content')

@foreach ($LessonDetails as $LessonDetail)
    <div class="card" style="width: 88rem;">
        
       {{ $LessonDetail}}
        
       
        </div>
    </div>
    <!-- Display lesson information -->
    
    <!-- Add more fields as needed -->
@endforeach


@endsection