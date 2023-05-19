<?php

use App\Models\Batch;
use App\Models\Teacher;
use App\Models\UserPayment;
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
    $batchdata = Batch::findorfail($batchID)->first();
    return $batchdata;
}

function  getTeacherData($teacherID) {
    $teacherdata = Teacher::findorfail($teacherID)->first();
    return $teacherdata;
}

function StudentPaymentCheck(){
   $StudentPaymentCheck = UserPayment::where('student_id',Auth::user()->id)->where('course_id',Auth::user()->course_id)->where('batch_id',Auth::user()->batch_id)->latest()->first();
   return $StudentPaymentCheck;
}