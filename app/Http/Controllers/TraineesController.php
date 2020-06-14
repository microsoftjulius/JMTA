<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainee;
use App\Content;
use Auth;
use DB;
use App\Courses;
use App\Exports\TraineeExport;
use Maatwebsite\Excel\Facades\Excel;

class TraineesController extends Controller
{
    public function __construct(){
        $this->email_function = new MailController();
    }
    protected function getEnrolmentForm($id){
        if(empty($id)){
            return redirect()->back()->withErrors("Please select a course you want to opt for");
        }
        if(Trainee::where('email_address',auth()->user()->email)->where('trainees.status','paid')->exists()){
            return redirect('/available-courses');
        }
        $course = Courses::where('id',$id)->value('course_name');
        return view('account_layouts.enrolment_form',compact('course'));
    }

    protected function getCourseContentPage(){
        if(Auth::user()->role == 'admin'){
            $course_content = Content::get();
            return view('account_layouts.course_content',compact('course_content'));
        }if(Trainee::where('email_address',Auth::user()->email)->doesntExist()){
            return redirect()->back()->withErrors("You can't view the course contents before enrolling");
        }
        elseif(Trainee::where('status','pending')->where('email_address',Auth::user()->email)->exists()){
            return redirect()->back()->with('message','Your account approval is still pending. 
                Once approved, we shall send you an email to access the course contents');
        }else{
            // $course_content = Trainee::where('email_address',auth()->user()->email)->join('content','content.course_id',
            // 'trainees.course_id')
            // ->get();
            $course_content = Content::get();
            return view('account_layouts.course_content',compact('course_content'));
        }
    }

    /**
     * Function that gets all the registered trainees
     */
    protected function getAllTrainees(){
        $trainees = DB::table('trainees')->get();
        $paid_employees = DB::table('trainees')->where('status','paid')->count();
        $pending_employees = DB::table('trainees')->where('status','pending')->count();

        $suspended_employees = DB::table('trainees')->where('status','suspended')->count();
        $trainees_count   = DB::table('trainees')->count();
        if(auth()->user()->role == 'admin'){
            return view('admin_pages.dashboard',compact('trainees','paid_employees','pending_employees','suspended_employees','trainees_count'));
        }
        else{
            if(DB::table('trainees')->where('email_address',auth()->user()->email)->exists()){
                return redirect('/course-contents');
            }else{
                return redirect('/courses');
            }
        }
    }
    /**
     * A trainee is a person who has created an account with us.
     * After they have logged in, they will fill an enrollment form
     * After submiting data, once approved, they will be able to view the course content
     */
    protected function enrollNewTrainee($id){
        $trainee = new Trainee();
        $trainee->first_name     = request()->first_name;
        $trainee->last_name      = request()->last_name;
        $trainee->gender         = request()->gender;
        $trainee->date_of_birth  = request()->date_of_birth;
        $trainee->nationality    = request()->nationality;
        $trainee->country        = request()->country;
        $trainee->state          = request()->state;
        $trainee->city           = request()->city;
        $trainee->phone_number   = request()->phone_number;
        $trainee->email_address  = request()->email_address;
        $trainee->marital_status = request()->marital_status;
        $trainee->denomination   = request()->denomination;
        $trainee->ministry       = request()->ministry;
        $trainee->local_church   = request()->local_church;
        $trainee->profession     = request()->profession;
        $trainee->occupation     = request()->occupation;
        $trainee->course_id      = request()->course_id;
        $trainee->status         = 'pending';
        $trainee->payment_method = request()->payment_method;   
        $trainee->save();
        return redirect()->back()->with('message','Thank you for filling the enrollment form, once a payment has been recieved, you will be able to access the course lessons');
    }
    
    /** A trainee can be activated so that they login to the contents page after they have paid
     * 
     */
    protected function activateTrainee($id){
        Trainee::where('id',$id)->update(array('status' => 'paid'));
        $email = Trainee::where('id',$id)->value('email_address');
        // $this->email_function->basic_email($email);
        return redirect()->back()->with('message','A trainee has been Activated Successfully and notified via email');
    }

    /**
     * Function to export the trainees to excell
     */
    public function export() 
    {
        return Excel::download(new TraineeExport, 'trainees.xlsx');
    }
    /**
     * A trainee can be suspended.
     */
    protected function suspendTrainee($id){
        Trainee::where('id',$id)->update(array('status' => 'suspended'));
        $email = Trainee::where('id',$id)->value('email_address');
        $subject = "Account Suspension";
        // $this->email_function->basic_email($email);
        return redirect()->back()->with('message','A trainee has been Suspended Successfully and notified via email');
    }
    /**
     * The function below is for validating the data
     */
    protected function validateUsersData(){
        if(Trainee::where('email_address',request()->email_address)->exists()){
            return redirect()->back()->withInput()->withErrors('You can only enroll once');
        }
        if(Trainee::where('phone_number',request()->phone_number)->exists()){
            return redirect()->back()->withInput()->withErrors('Phone number already exists');
        }
        if(empty(request()->first_name)){
            return redirect()->back()->withInput()->withErrors('First name is required before you continue');
        }
        
        if(empty(request()->last_name)){
            return redirect()->back()->withInput()->withErrors('Last name is required before you continue');
        }
        
        if(empty(request()->gender)){
            return redirect()->back()->withInput()->withErrors('Gender is required before you continue');
        }
        
        if(empty(request()->date_of_birth)){
            return redirect()->back()->withInput()->withErrors('Date of birth is required before you continue');
        }
        
        if(empty(request()->nationality)){
            return redirect()->back()->withInput()->withErrors('Nationality is required before you continue');
        }
        
        if(empty(request()->country)){
            return redirect()->back()->withInput()->withErrors('Country is required before you continue');
        }
        
        if(empty(request()->payment_method)){
            return redirect()->back()->withInput()->withErrors('Please select a payment method to continue');
        }

        if(empty(request()->state)){
            return redirect()->back()->withInput()->withErrors('State is required before you continue');
        }
        
        if(empty(request()->city)){
            return redirect()->back()->withInput()->withErrors('City is required before you continue');
        }
        if(empty(request()->phone_number)){
            return redirect()->back()->withInput()->withErrors('Phone Number is required before you continue');
        }
        if(empty(request()->email_address)){
            return redirect()->back()->withInput()->withErrors('Email Address is required before you continue');
        }
        
        if(empty(request()->marital_status)){
            return redirect()->back()->withInput()->withErrors('Marital Status is required before you continue');
        }
        if(empty(request()->denomination)){
            return redirect()->back()->withInput()->withErrors('Denomination is required before you continue');
        }
        if(empty(request()->ministry)){
            return redirect()->back()->withInput()->withErrors('Ministry is required before you continue');
        }
        if(empty(request()->local_church)){
            return redirect()->back()->withInput()->withErrors('Local Church is required before you continue');
        }
        if(empty(request()->profession)){
            return redirect()->back()->withInput()->withErrors('Profession is required before you continue');
        }
        if(empty(request()->occupation)){
            return redirect()->back()->withInput()->withErrors('Occupation is required before you continue');
        }else{
            return $this->enrollNewTrainee(request()->course_id);
        }
    }
}
