<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Industry;
use DB;
use Hash;
use Mail;
use Carbon\Carbon;
class enquiryies extends Controller
{
    //
    function save(Request $req)
    {   
        $full_name = $req->full_name;
        $comp_name = $req->comp_name;
        $email = $req->email;
        $mobile = $req->mobile;
        $doubt = $req->doubt;
        $path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $browser = request()->userAgent();
        $ip = $req->ip(); 

        $req -> validate([
            "full_name"=>"required|regex:/^[a-zA-Z\s]+$/u|max:35",
            "comp_name"=>"required|alpha_num|max:100",
            "email"=>"required|email",
            "mobile"=>"nullable|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15",
            "doubt"=>"nullable|regex:/^[a-zA-Z0-9_!@#()<>\s]+$/|max:2000",
            "checkbox1"=>"required",
            "checkbox2"=>"required",
            
        ],[
            "full_name.required"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "full_name.regex"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "full_name.max"=>"Please enter full name. Max 35 characters allowed. 
            - Numeric and special characters are not allowed.",
            "comp_name.required"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "email.required"=>"Please enter valid email id.",
            "comp_name.alpha_num"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "email.required"=>"Please enter valid email id.",
            "comp_name.max"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "email.required"=>"Please enter valid email id.",
            "email.email"=>"Please enter valid email id.",
            "mobile.regex"=>"Please enter a valid mobile.Min 10 to max 15 numeric characters allowed.",
            "mobile.between"=>"Please enter a valid mobile.Min 10 to max 15 numeric characters allowed.",
            "doubt.regex"=>"Password is the required entity in form
•	Password must be of min 12 characters ",
            "doubt.max"=>"Password is the required entity in form
•	Password must be of min 12 characters ",
            "checkbox1.required"=>"Please select the checkbox.",
            "checkbox2.required"=>"Please check privacy policy & term of use checkbox.",
            
        ]);

        Mail::send('emails.contactmail',[
            'full_name' => $req->full_name,
            'comp_name' => $req->comp_name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'doubt' => $req->doubt,
            'created_at' =>  $current_date_time = Carbon::now()->toDateTimeString(),
        ],function ($mail) use($req){
            $mail->from(env('MAIL_FROM_ADDRESS'),$req->full_name);
            $mail->to('programmingraw@gmail.com')->subject("Client Message");
        });
        Mail::send('emails.website-enquiry-email',[
            'full_name' => $req->full_name,
        ],function ($mail) use($req){
            $mail->from(env('MAIL_FROM_ADDRESS'),$req->full_name);
            $mail->to('programmingraw@gmail.com')->subject("Sales Message ");
        });


        $mytime = Carbon::now();
        $mytime->toDateTimeString();

        
        DB::select('call insertData(?,?,?,?,?,?,?,?)',[$full_name,$comp_name,$email,$mobile,$doubt,$path,$browser,$ip]);
        $datas = DB::select('call getuserinfo()');
        return view('view-info', compact('datas'));
        // return redirect('/viewinfo', compact('datas'));

    }
    // public function index()
    // {
    //     $datas = Enquiry::all();

    //     return view('view-info', compact('datas'));
    // }

    public function getuserinfo()
    {
        $datas = DB::select('call getuserinfo()');
        return view('view-info', compact('datas'));
    }
    public function edit($id)
    {
        $data = Enquiry::findOrFail($id);
        return view('edit', compact('data'));
    }
    public function data($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "full_name"=>"required|regex:/^[a-zA-Z\s]+$/u|max:35",
            "comp_name"=>"required|alpha_num|max:100",
            "email"=>"required|email",
            "mobile"=>"nullable|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15",
            "doubt"=>"nullable|regex:/^[a-zA-Z0-9_!@#()<>\s]+$/|max:2000",
        ]);
        Enquiry::whereId($id)->update($validatedData);

        return redirect('/datas')->with('success', 'Show is successfully updated');
    }
    public function destroy($id)
    {
        $data = DB::select('call deleteInfo(?)',[$id]);
        // $data = Enquiry::findOrFail($id);
        // $data->delete();

        return redirect('/datas')->with('success', 'Data is successfully deleted');
    }
    public function store(Request $req)
    {
        $full_name = $req->full_name;
        $company_name = $req->company_name;
        $username = $req->username;
        $password = $req->password;
        $contact_number = $req->contact_number;
        $industry_id = $req->industry_id;
        $scheduled_date = $req->scheduled_date;
        $scheduled_time_slot_id = $req->scheduled_time_slot_id;
        // $path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $client_browser = request()->userAgent();
        $client_ip = $req->ip();
        

        $req -> validate([
            "full_name"=>"required|regex:/^[a-zA-Z\s]+$/u|max:35",
            "company_name"=>"required|alpha_num|max:100",
            "username"=>"required|email",
            "contact_number"=>"required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15",
            "password" => "required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/",
            "industry_id"=>"required",
            "scheduled_date" => "required|date",
            "scheduled_time_slot_id"=>"required",
            "checkbox1"=>"required",
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
            "checkbox1.required"=>"Please select the checkbox.",
            "checkbox2.required"=>"Please check privacy policy & term of use checkbox.",
            "checkbox3.required"=>"Please select the checkbox.",
            
        ]);
        $hashedPassword = Hash::make($password);

        DB::select('call insertData(?,?,?,?,?,?,?,?,?,?)',[$full_name,$company_name,$username,$hashedPassword,$contact_number,$industry_id,$scheduled_date,$scheduled_time_slot_id,$client_ip,$client_browser]);
        return redirect('demo-form')->with('success', 'Messsage is successfully send');
    }
    public function index()
    {
        $datas = Industry::all();
        return view('demo', compact('datas'));
    }


}
