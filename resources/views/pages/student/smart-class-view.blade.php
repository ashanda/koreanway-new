@extends('layouts.app')

@section('content')

@foreach ($smartClassDatas as $smartClassData)
    <div class="card" style="width: 18rem;">
        
        <h5 class="card-title">{{ $smartClassData->title }}</h5>
        
       
        </div>
    </div>
    <!-- Display lesson information -->
    
    <!-- Add more fields as needed -->
@endforeach


@endsection