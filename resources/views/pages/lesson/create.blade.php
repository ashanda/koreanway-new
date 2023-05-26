@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h3>Add New Class</h3>
        </div>
        <div class="float-end">
            <a class="btn  btn-primary" href="{{ url()->previous() }}">Classes</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <label>Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


    @php
    $uniqueRandomNumber = uniqid();
    @endphp
    <div class="row">
       
            <form id="form1" action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Lesson Title</label>
                    <input type="text" name="lesson_title" class="form-control" placeholder="Class Title">
                    <input type="hidden" name="lesson_id" value=" {{ $uniqueRandomNumber }}" readonly>
                </div>
              </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="teacher_id" class="form-label">Teacher ID:</label>
                        <select class="form-control" name="teacher_id-live" id="teacher_id">
                            @foreach($teacher_data as $data )
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="batch_id" class="form-label">Batch Id:</label>
                        <select class="form-control" name="batch_id-live" id="batch_id">
                            @foreach($batch_data as $data )
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="course_id" class="form-label">Course Id:</label>
                        <select class="form-control" name="course_id-live" id="course_id">
                            @foreach($course_data as $data )
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Class Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Pubished date</label>
                        <input type="date" name="published_date-live" class="form-control" placeholder="published date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-control" name="status-live" id="status">
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                </div>
            <!---------------------Live Lessons------------------------>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="is_live_lesson" class="form-label">Is Live Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_live_lesson" id="live_lesson_true" value="1" checked>
                        <label class="form-check-label" for="live_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_live_lesson" id="live_lesson_false" value="0">
                        <label class="form-check-label" for="live_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <div class="form-group">
                    <label>Class Title</label>
                    <input type="text" name="live_title" class="form-control" placeholder="Class Title">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <input type="text" name="live" class="form-control" value="Live" readonly>
                   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-control" name="paytype-live" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Class Lesson</label>
                    <input type="text" name="lesson-live" class="form-control" placeholder="Class Lesson">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Class Link</label>
                    <input type="text" name="link-live" class="form-control" placeholder="Class Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password-live" class="form-control" placeholder="Password">
                </div>
            </div>
            
            
            
            
            
            <!---------------------Video Lessons------------------------>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="is_video_lesson" class="form-label">Is Video Lesson:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_video_lesson" id="video_lesson_true" value="1" checked>
                        <label class="form-check-label" for="video_lesson_true">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_video_lesson" id="video_lesson_false" value="0">
                        <label class="form-check-label" for="video_lesson_false">
                            False
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Class Title</label>
                    <input type="text" name="title-video" class="form-control" placeholder="Class Title">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <input type="text" class="form-control" name="video" value="Video" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-control" name="paytype-video" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Class Lesson</label>
                    <input type="text" name="lesson-video" class="form-control" placeholder="Class Lesson">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Available Days</label>
                    <input type="text" name="available_days-video" class="form-control" placeholder="Available Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Number of Views</label>
                    <input type="text" name="no_of_views-video" class="form-control" placeholder="Number of Views">
                </div>
            </div>
            
           
         
            
        <!---------------------Paper Lessons------------------------>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="is_paper_lesson" class="form-label">Is Paper Lesson:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_paper_lesson" id="paper_lesson_true" value="1" checked>
                    <label class="form-check-label" for="paper_lesson_true">
                        True
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_paper_lesson" id="paper_lesson_false" value="0">
                    <label class="form-check-label" for="paper_lesson_false">
                        False
                    </label>
                </div>
            </div>
          </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <label>Class Title</label>
                    <input type="text" name="title-paper" class="form-control" placeholder="Class Title">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="classtype" class="form-label">Lesson Type:</label>
                    <input type="text" class="form-control" name="lesson-type-paper" value="Paper" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="paytype" class="form-label">Payement Type:</label>
                    <select class="form-control" name="paytype-paper" id="paytype">
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Class Document</label>
                    <input type="file" name="doc-paper" class="form-control">
                </div>
            </div>


            <button type="submit" id="submit" >Save Lesson</button>

        </form>
 
       
        
        
        
        
        
        






@endsection