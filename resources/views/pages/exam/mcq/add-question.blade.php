@extends('layouts.app')

@section('content')
<div class="container-fluid">
				    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add Question</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Add Question</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Question</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add questions</h4>
                    <a href="{{ route('mcq-exams.show',$exam->id) }}" class="btn btn-dark">Back to questions list</a>
                </div>
                <div class="card-body">
            
                                                                            
                                            
@if ($question_count < $exam->exam_question)
<form method="POST" action="{{ route('add_question_db') }}" autocomplete="off" data-np-autofill-type="other" data-np-checked="1" data-np-watching="1">
    @csrf
    <div class="question-title">Question</div>
    <div class="form-group">
        
        <input type="hidden" name='exam_id' value="{{ $exam->id }}" required>
        <label for="">Question</label>
        <textarea name="question" id="" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label for="">Upload</label>
        <input type="file" name="document" id="">
    </div>
    <div class="form-group">
    <input name="ans_1" type="text" required="required" class="form-control" id="ans_1" placeholder="Answer 1" value="" required>
    </div>
    <div class="form-group">
    <input name="ans_2" type="text" required="required" class="form-control" id="ans_2" placeholder="Answer 2" value="" required>
    </div>
    <div class="form-group">
    <input name="ans_3" type="text" required="required" class="form-control" id="ans_3" placeholder="Answer 3" value="" required>
    </div>
    <div class="form-group">
    <input name="ans_4" type="text" required="required" class="form-control" id="ans_4" placeholder="Answer 4" value="" required>
    </div>
    
    <div class="form-group">
    <div class="row">
    <div class="col-sm-6">
    <div class="dropdown bootstrap-select form-control"><select name="ans" required="required" class="form-control" id="ans" tabindex="-98 " required>
    <option value="" hidden="yes">-Select-</option>
    <option value="1">Answer 1</option>
    <option value="2">Answer 2</option>
    <option value="3">Answer 3</option>
    <option value="4">Answer 4</option>
    </select><button type="button" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="button" data-id="ans" title="-Select-"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">-Select-</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
    </div>
    </div>
    </div>
    
    <button name="submit_btn" type="submit" class="btn btn-success">Add New &amp; Next</button>
    </form>
@else
    <h3 class="">No addded question</h3>
@endif
                    

                    
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection