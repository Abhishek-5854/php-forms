<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Form;
use DB;
use Crypt;

class FormController extends Controller {
    public function show(){
        // $forms = Form::all();
        return view('form');
    }

    /*public function ty() {
        return view('thank');
    }*/

    public function create(Request $request) {

        $full_name = request("full_name");
        $company_name = request("company_name");
        $contact_number = request("phone");
        $encrypted_contact_no = encrypt($request->phone);
        $username = request("email");
        $username_shorten = substr(($request->email),0,5).''.'************';
        $scheduled_date = request("demo_date");
        $scheduled_time_slot_id = request("time_slot");
        $client_browser = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $client_ip = request()->ip();
        $enquiry_from_page = request()->header('User-Agent');
        //$industry_name = request("industry");
        //$industry_id = DB::select("call ViewIndustryID('$industry_name')");
        $industry_id = request("industry");
        $username_encrypt = Crypt::encrypt( $request->email);
        DB::select('CALL guided_demo(?,?,?,?,?,?,?,?,?,?,?,?,?)',array("$full_name", "$company_name", "$contact_number", "$encrypted_contact_no", "$username", "$username_shorten", "$scheduled_date", "$scheduled_time_slot_id", "$enquiry_from_page", "$client_ip", "$client_browser", "$industry_id", "$username_encrypt"));
        
        $request->validate([
            'demo_date' => 'required',
            'time_slot' => 'required',
            'full_name' => 'required|max:35\regex:/^[a-zA-Z][a-zA-Z]+[a-zA-Z]$/',
            'company_name' => 'required|max:35|alpha_num',
            'phone' => 'required|min:10|max:15',
            'email' => 'required|email:rfc,dns',
        ]);

        //return redirect('/thank');
    }
}



