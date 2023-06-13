@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-2">
        <div class="float-start">
            <h3>Homeworks</h3>
        </div>
    </div>
</div>

<div class="table-responsive mt-2">
    <table id="dataTable" class="table table-bordered">
        <thead class="thead-dark">

            <tr>
                <th>No</th>
                <th>Lesson ID</th>
                <th>User ID</th>
                <th>Document</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userhomeworks as $userhomework)
            @php
            $i=1;
            @endphp

            <tr>
                <td>{{ $i }}</td>
                <td>{{ $userhomework->lesson_id }}</td>
                <td>{{ getUserData($userhomework->user_id)->fullname }}</td>
                <td><a href="{{ asset('/lesson/homework/' . $userhomework->document) }}"><img width="50" src="{{ asset('/lesson/homework/' . $userhomework->document) }}" alt="Class Image"></a></td>
            </tr>
            @php
            $i ++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>


@endsection