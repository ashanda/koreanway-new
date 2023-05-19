<?php

use App\Models\Batch;
use App\Models\Teacher;


function  getBatchData($batchID) {
    $batchdata = Batch::findorfail($batchID)->first();
    return $batchdata;
}

function  getTeacherData($teacherID) {
    $teacherdata = Teacher::findorfail($teacherID)->first();
    return $teacherdata;
}