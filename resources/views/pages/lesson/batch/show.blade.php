@extends('layouts.app')

@section('content')
<div class="pt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3> Show Batch</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-primary" href="{{ route('batch.index') }}"> Back</a>
            </div>
        </div>
    </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Batch Name:</label>
                            {{ $batch->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Details:</label>
                            {{ $batch->status }}
                            {{ $batch->visible }}
                        </div>
                    </div>
                </div>
            </div>

</div>



@endsection