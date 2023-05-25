<?php

namespace App\Http\Controllers;

use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPayment $userPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPayment $userPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
    
        // Retrieve the payment record
        $payment = UserPayment::findOrFail($id);
    
        // Update the payment record with the submitted data
        $payment->admin_name = Auth::user()->name;
        $payment->amount = $request->input('paymentAmount');
        $payment->start_date = $request->input('paymentStart');
        $payment->end_date = $request->input('paymentEnd');
        $payment->plan = $request->input('plan');
        $payment->status = $request->input('paymentStatus');
        // Update other fields as needed
    
        // Save the updated payment record
        $payment->save();
    
        // Optionally, you can add a flash message to the session
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPayment $userPayment)
    {
        //
    }


    public function saveData(Request $request)
    {


        // Process the payment and store the data
        // Example code: saving the form data to a model
        $payment = new UserPayment;
        $payment->student_id = Auth::user()->id;
        $payment->amount = $request->amount;
        $payment->course_id = $request->course_id;
        $payment->batch_id = $request->batch_id;
        $payment->teacher_id = $request->teacher_id;
        $payment->payment_type = 'Bank Tranfer';
        $payment->status = 2;
        // Save the uploaded file and store its path in the model
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/payments/slips'), $filename);
            $payment->file_name = $filename;
           
        }
        $payment->save();

        Alert::success('Success', 'Your Slip has been uploaded waiting for verification.');  
        return redirect()->back()->with('success', 'Your Slip has been uploaded waiting for verification.');
    }


    public function paytype(Request $request ,$paytype){

        if(Auth::guard('admin')->check()){

        if ($paytype == 'pending-bank-tranfer') {
            $title = 'Pending Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 2)->latest() ->paginate(5);
        }elseif ($paytype == 'paid-bank-tranfer') {
            $title = 'Paid Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 1)->latest() ->paginate(5);
        }elseif($paytype == 'paid-manual-payments'){
            $title = 'Paid Manual Payments';
            $payments = UserPayment::where('payment_type', 'Manual Payment')->where('status', '=', 1)->latest() ->paginate(5);
        }elseif($paytype == 'paid-online-payments'){
            $title = 'Paid Online Payments';
            $payments = UserPayment::where('payment_type', 'Online Payment')->where('status', '=', 1)->latest() ->paginate(5);
        }elseif ($paytype == 'reject-bank-tranfer') {
            $title = 'Reject Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 3)->paginate(5);
        }
    }elseif(Auth::guard('teacher')->check()){
        if ($paytype == 'pending-bank-tranfer') {
            $title = 'Pending Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 2)->where('teacher_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif ($paytype == 'paid-bank-tranfer') {
            $title = 'Paid Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 1)->where('teacher_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif($paytype == 'paid-manual-payments'){
            $title = 'Paid Manual Payments';
            $payments = UserPayment::where('payment_type', 'Manual Payment')->where('status', '=', 1)->where('teacher_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif($paytype == 'paid-online-payments'){
            $title = 'Paid Online Payments';
            $payments = UserPayment::where('payment_type', 'Online Payment')->where('status', '=', 1)->where('teacher_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif ($paytype == 'reject-bank-tranfer') {
            $title = 'Reject Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 3)->where('teacher_id','=',Auth::user()->id)->paginate(5);
        }

    }else{
        if ($paytype == 'pending-bank-tranfer') {
            $title = 'Pending Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 2)->where('student_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif ($paytype == 'paid-bank-tranfer') {
            $title = 'Paid Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 1)->where('student_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif($paytype == 'paid-manual-payments'){
            $title = 'Paid Manual Payments';
            $payments = UserPayment::where('payment_type', 'Manual Payment')->where('status', '=', 1)->where('student_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif($paytype == 'paid-online-payments'){
            $title = 'Paid Online Payments';
            $payments = UserPayment::where('payment_type', 'Online Payment')->where('status', '=', 1)->where('student_id','=',Auth::user()->id)->latest() ->paginate(5);
        }elseif ($paytype == 'reject-bank-tranfer') {
            $title = 'Reject Bank Transaction';
            $payments = UserPayment::where('payment_type', 'Bank Tranfer')->where('status', '=', 3)->where('student_id','=',Auth::user()->id)->paginate(5);
        }

    }
        return view('pages.payment.index', compact('payments','paytype','title'))->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function manualPay(Request $request){
        $payment = new UserPayment;
        $payment->student_id = $request->student_name;
        $payment->admin_name = Auth::user()->name;
        $payment->amount = $request->amount;
        $payment->course_id = $request->course_id;
        $payment->batch_id = $request->batch_id;
        $payment->teacher_id = $request->teacher_id;
        $payment->payment_type = 'Manual Payment';
        $payment->start_date = $request->start_date;
        $payment->plan = $request->plan;
        $payment->end_date = $request->end_date;
        $payment->status = 1;
        $payment->save();

        Alert::success('Success', 'Manual Payment Added.');  
        return redirect()->back();

    }
}