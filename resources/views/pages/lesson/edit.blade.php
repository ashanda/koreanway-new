    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Edit Class</h3>
            </div>
            <div class="float-end">
                <a class="btn  btn-primary" href="{{ route('lesson.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <label class="form-label">Error!</label> <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('lesson.update',$lesson->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            @if($lesson->classtype == 'Schedule')
            <p>This is Schedule inputs</p>
            @elseif($lesson->classtype == 'Tute')
            <p>This is Tute inputs</p>
            @elseif($lesson->classtype == 'Video')
            <p>This is Video inputs</p>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Class Title</label>
                    <input type="text" name="title" value="{{ $lesson->title }}" class="form-control form-control-lg" placeholder="Class Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="classtype" class="form-label">Class Type:</label>
                    <select class="form-select form-select-lg" name="classtype" id="classtype">
                        <option value="Schedule" {{ $lesson->classtype == 'Schedule' ? 'selected' : '' }}>Class Schedule</option>
                        <option value="Tute" {{ $lesson->classtype == 'Tute' ? 'selected' : '' }}>Class Tute</option>
                        <option value="Video" {{ $lesson->classtype == 'Video' ? 'selected' : '' }}>Video Lesson</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="paytype" class="form-label">Payment Type:</label>
                    <select class="form-select form-select-lg" name="paytype" id="paytype">
                        <option value="Paid" {{ $lesson->paytype == 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Free" {{ $lesson->paytype == 'Free' ? 'selected' : '' }}>Free</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="teacher_id" class="form-label">Teacher ID:</label>
                    <select class="form-select form-select-lg" name="teacher_id" id="teacher_id">
                        @foreach($teacher_data as $data)
                        <option value="{{$data->id}}" {{ $data->id == $lesson->teacher_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="batch_id" class="form-label">Batch Id:</label>
                    <select class="form-select form-select-lg" name="batch_id" id="batch_id">
                        @foreach($batch_data as $data)
                        <option value="{{$data->id}}" {{ $data->id == $lesson->batch_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="course_id" class="form-label">Course Id:</label>
                    <select class="form-select form-select-lg" name="course_id" id="course_id">
                        @foreach($course_data as $data)
                        <option value="{{$data->id}}" {{ $data->id == $lesson->course_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Class Lesson</label>
                    <input type="text" name="lesson" value="{{ $lesson->lesson }}" class="form-control form-control-lg" placeholder="Class Lesson">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Class Image</label>
                    <input type="file" name="image" class="form-control form-control-lg">
                    <img width="100" src="{{ asset('/kycs/img/' . $lesson->image) }}" alt="Class Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Class Document</label>
                    <input type="file" name="doc" class="form-control form-control-lg">
                    <a target="_blank" href="{{ asset('/kycs/doc/' . $lesson->doc) }}">View</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Class Link</label>
                    <input type="text" name="link" value="{{ $lesson->link }}" class="form-control form-control-lg" placeholder="Class Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Available Days</label>
                    <input type="text" name="available_days" value="{{ $lesson->available_days }}" class="form-control form-control-lg" placeholder="Available Days">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Number of Views</label>
                    <input type="text" name="no_of_views" value="{{ $lesson->no_of_views }}" class="form-control form-control-lg" placeholder="Number of Views">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Select Level</label>
                    <select class="form-select form-select-lg" name="level" id="level">
                        <option value="1" {{ $lesson->level == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $lesson->level == '2' ? 'selected' : '' }}>2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="no_of_views" value="{{ $lesson->password }}" class="form-control form-control-lg" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-select form-select-lg" name="status" id="status">
                        <option value="1" {{ $lesson->status == '1' ? 'selected' : '' }}>Publish</option>
                        <option value="0" {{ $lesson->status == '0' ? 'selected' : '' }}>Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-end pt-2">
                <button type="submit" class="btn  btn-primary">Submit</button>
            </div>
        </div>

    </form>



    @endsection