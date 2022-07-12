<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Industry;
use DB;
use Hash;
use Crypt;
use Mail;
use Carbon\Carbon;
class enquiryies extends Controller
{
    public function store(Request $req)
    {
        $full_name = $req->full_name;
        $company_name = $req->company_name;
        $username = $req->username;
        $username_shorten = substr(($req->username),0,5).''.'************';
        $password = $req->password;
        $contact_number = $req->contact_number; 
        $industry_id = $req->industry_id;
        $scheduled_date = $req->scheduled_date;
        $scheduled_date = date('Y-m-d');
        $scheduled_time_slot_id = $req->scheduled_time_slot_id;
        // $path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $client_browser = request()->userAgent();
        $client_ip = $req->ip();
        

        $req -> validate([
            "full_name"=>"required|regex:/^[a-zA-Z\s]+$/u|max:35",
            "company_name"=>"required|alpha_num|max:100",
            "username"=>"required|email",
            "contact_number"=>"required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15",
            "password" => "required|min:8|regex:/^(?=(.*[a-z]){1,})(?=(.*[A-Z]){1,})(?=(.*[0-9]){1,})(?=(.*[!@#$%^&*()\-__+.]){1,}).{8,}$/",
            "industry_id"=>"required",
            "scheduled_date" => "required|date",
            "scheduled_time_slot_id"=>"required",
            "checkbox2"=>"required",
            "checkbox3"=>"required",
            
        ],[
            "full_name.required"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "full_name.regex"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "full_name.max"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "company_name.required"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "username.required"=>"Please enter valid email id.",
            "comp_name.alpha_num"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "username.required"=>"Please enter valid email id.",
            "company_name.max"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "email.required"=>"Please enter valid email id.",
            "username.email"=>"Please enter valid email id.",
            "contact_number.required"=>"Please enter a valid mobile.Min 10 to max 15 numeric characters allowed.",
            "contact_number.regex"=>"Please enter a valid mobile.Min 10 to max 15 numeric characters allowed.",
            "contact_number.between"=>"Please enter a valid mobile.Min 10 to max 15 numeric characters allowed.",
            "password.required"=>"Password is the required entity in form. Password must be of min 8 characters ",
            "password.regex"=>"Password is the required entity in form. Password must be of min 8 characters ",
            "password.min"=>"Password is the required entity in form. Password must be of min 8 characters ",
            "industry_id.required"=>"Please select the industry.",
            "scheduled_date.required"=>"Please select the date for demo.",
            "scheduled_time_slot_id.required"=>"Please select the Timeslot for your demo.",
            "checkbox2.required"=>"Please check privacy policy & term of use checkbox.",
            "checkbox3.required"=>"Please select the checkbox.",
            
        ]);
        $hashedPassword = Hash::make($password);
        $username_encrypt = Crypt::encrypt( $req->username);

        DB::select('call insertData(?,?,?,?,?,?,?,?,?,?,?,?)',[$full_name,$company_name,$username,$hashedPassword,$contact_number,$industry_id,$scheduled_date,$scheduled_time_slot_id,$client_ip,$client_browser,$username_shorten,$username_encrypt]);
        return redirect('demo-form')->with('success', 'Messsage is successfully send');
    }
    public function index()
    {
        $datas = DB::select('call getIndustryData()');
        return view('demo', compact('datas'));
    }


}
