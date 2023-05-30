<?php

use App\Models\Batch;
use App\Models\Teacher;
use App\Models\UserPayment;
use App\Models\Course;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Lesson;
use App\Models\UserCourse;
use App\Models\LessonDetail;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function sendSMS($phone,$message)
{
    $MSISDN = $phone;
	$SRC = 'Araliya CCT';
	$MESSAGE = ( urldecode($message));
	$AUTH = "716|dgD95hyXSbuxuoj5F4pG8QBdJ4wcoFzo064CAuhs ";  //Replace your Access Token
	
	$msgdata = array("recipient"=>$MSISDN, "sender_id"=>$SRC, "message"=>$MESSAGE);


			
			$curl = curl_init();
			
			//IF you are running in locally and if you don't have https/SSL. then uncomment bellow two lines
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://sms.send.lk/api/v3/sms/send",
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => json_encode($msgdata),
			  CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"authorization: Bearer $AUTH",
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}
}

function  getBatchData($batchID) {
    $batchdata = Batch::where('id',$batchID)->first();
    return $batchdata;
}

function  getTeacherData($teacherID) {
    $teacherdata = Teacher::where('id',$teacherID)->first();
    return $teacherdata;
}

function  getCourseData($courseID) {
    $teacherdata = Course::where('id',$courseID)->first();
    return $teacherdata;
}

function  getUserData($userID) {
    $teacherdata = Student::findorfail($userID)->first();
    return $teacherdata;
}

function getUserLesseonData($lessons) {
	$UserCourseDatas = UserCourse::where('user_id', Auth::user()->id)->get();
	
        $filteredLessons = collect();
        
        foreach ($UserCourseDatas as $UserCourseData) {
            $matchingLesson = $lessons->where('course_id', $UserCourseData->course_id)
                ->where('batch_id', $UserCourseData->batch_id)
                ->first();
        
            if ($matchingLesson) {
                $filteredLessons->push($matchingLesson);
            }
        }
		
        $currentPage = request()->get('page', 1);
        $perPage = 5;
        $total = $filteredLessons->count();
        $lessons = $filteredLessons->forPage($currentPage, $perPage);
        
        $lessonsPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $lessons,
            $total,
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

		return $lessonsPaginated ;
}

function getUserNoticeData() {
    $lessons = Notification::all();
	$UserCourseDatas = UserCourse::where('user_id', Auth::user()->id)->get();
	
        $filteredLessons = collect();
        
        foreach ($UserCourseDatas as $UserCourseData) {
            $matchingLesson = $lessons->where('course_id', $UserCourseData->course_id)
                ->where('batch_id', $UserCourseData->batch_id)
                ->first();
        
            if ($matchingLesson) {
                $filteredLessons->push($matchingLesson);
            }
        }
		
        

		return $filteredLessons ;
}

function getUserCourseData($lessons) {
	$UserCourseDatas = UserCourse::where('user_id', Auth::user()->id)->get();
	
        $filteredLessons = collect();
        
        foreach ($UserCourseDatas as $UserCourseData) {
            $matchingLesson = $lessons->where('course_id', $UserCourseData->course_id)
                ->where('batch_id', $UserCourseData->batch_id)
                ->first();
        
            if ($matchingLesson) {
                $filteredLessons->push($matchingLesson);
            }
        }
		
        $currentPage = request()->get('page', 1);
        $perPage = 5;
        $total = $filteredLessons->count();
        $lessons = $filteredLessons->forPage($currentPage, $perPage);
        
        $lessonsPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $lessons,
            $total,
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

		return $lessonsPaginated ;
}

function StudentPaymentCheck($course_id,$batch_id){

   $StudentPaymentCheck = UserPayment::where('student_id',Auth::user()->id)->where('course_id',$course_id)->where('batch_id',$batch_id)->latest()->first();
   return $StudentPaymentCheck;
   
}

function  getAllUsers() {
    $getAllUsers = Student::all();
    return $getAllUsers;
}

function getStudentcount(){
    $totalUsers = Student::count();
    return $totalUsers;
}

function getTeachercount(){
    $totalTeachers = teacher::count();
    return $totalTeachers;
}

function getAdmincount(){
    $totalAdmin = Admin::count();
    return $totalAdmin;
}

function getCoursecount(){
    $totalCourses = Course::count();
    return $totalCourses;
}

function getBatchcount(){
    $totalBatches = Course::count();
    return $totalBatches;
}

function getVideoLessoncount(){
    $totalvideolesson = Lesson::where('classtype','video')->count();
    return $totalvideolesson;
}

function getLiveLessoncount(){
    $totalvideolesson = Lesson::where('classtype','Live')->count();
    return $totalvideolesson;
}

function getTotalpayment(){
    $totalpayments = UserPayment::where('status', 1)->count();
    return $totalpayments;
}

function thisMonthEarn(){
    $lastDayOfMonth = Carbon::now()->endOfMonth();
    $formattedLastDay = $lastDayOfMonth->format('Y-m-d');
    $paidAmount = UserPayment::where('status', 1)->where('updated_at','<=', $formattedLastDay)->sum('amount');
    // Format the paid amount with commas
    $formattedAmount = number_format($paidAmount, 0, '.', ',');

    return $formattedAmount;
}

function getCourseBatchBaseCount(){
    $coursebatches = Course::where('status', 'Publish')->get();
    
    foreach($coursebatches as $coursebatche){
        $CouseBath = UserCourse::where('course_id',$coursebatche->id)->where('batch_id',$coursebatche->batch_id)->get();
    } 
    return $CouseBath;
}
