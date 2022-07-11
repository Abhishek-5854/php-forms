<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;
use DB;
use Crypt;

class IndustryController extends Controller
{
    public function index()
    {
        return view('test');

    }
    public function show()
    {
        // $shows = Enquiry::all();
        $shows = DB::select('call ViewIndustryData()');


        return view('main_page', compact('shows'));
    }
    public function form($industry_name)
    {
        // $industrys = DB::select("call ViewIndustryID('$industry_name')");

        return view('industry_view', compact('industry_name'));
    }
    public function enquiry(Request $request)
    {
        
        $messages=
        [
            "full_name.required"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed. ",
            "full_name.max"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",
            "full_name.regex"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",

            "company_name.required"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.alpha_num"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.max"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",

            "mobile_no.required" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.max" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.min" => "The Mobile Number Must be between 10 to 15 Digits",



            "email_id.required"=>"Please enter valid email id.",
            "email_id.email"=>"Please enter valid email id.",

            "ip_ack.accepted"=>"Please accept the ip monitoring checkbox",

            "terms_ack.accepted"=>"Please accept the privacy policy & term of use checkbox.",

            'quer.max'=> "The Query should be at max 2000 digits",


        ];

        $rules = [
            'full_name' => 'required|max:35|regex:/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/',
            'company_name' => 'required|max:35|alpha_num',
            'mobile_no' => 'required|min:10|max:15',
            'quer' => 'max:2000',
            'email_id'=>'email:rfc,dns',
            'ip_ack' => 'accepted',
            'terms_ack' => 'accepted'
        ];

        $validate =  Validator::make($request->all(),$rules,$messages);
 

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        // $show = Enquiry::create($validate);


        $full_name = $request->full_name;
        $company_name = $request->company_name;
        $email_id = $request->email_id;

        $username_encrypt = Crypt::encrypt( $request->email_id);
        $username_shorten = substr(($request->email_id),0,5).''.'************';

        $mobile_no = $request->mobile_no;

        $myStr = $request->mobile_no;
        $contact_length = strlen($myStr);
        $star ="***************";
        $mobile_short = substr($myStr, 0, 5) . substr($star,5,$contact_length-5);
        $mobile_encrypt = encrypt($request->mobile_no);


        $quer = $request->quer;
        // $mobile_encrypt="encrypted";
        $industry_name = $request->industry;
        // $ip_address = request()->ip();
        $ip_address = $this->getIp(); 
        $page_path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $browser_details = request()->userAgent();
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();
        $industrys = DB::select("call ViewIndustryID('$industry_name')");
        $device = Agent::device();
        $os = Agent::platform();
        $UserInfo= Location::get();
        $location= $UserInfo->cityName;

        
        


        // DB::select('call InsertData(?,?,?,?,?,?,?,?,?,?)',array($full_name ,$company_name ,$email_id ,$mobile_no ,$quer ,$ip_address ,$page_path ,$browser_details ,$created_at ,$updated_at));
        // DB::select('call InsertEnquiry(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($full_name ,$company_name ,$mobile_no ,$quer ,$ip_address ,$page_path ,$created_at ,$browser_details ,$mobile_short,$mobile_encrypt,$os,$device,$industry_id,$email_id,$location));

        foreach($industrys as $industry){
            DB::select('call InsertEnquiry(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($full_name ,$company_name ,$mobile_no ,$quer ,$ip_address ,$page_path ,$created_at ,$browser_details ,$mobile_short,$mobile_encrypt,$os,$device,$industry->industry_id,$email_id,$location,$username_shorten,$username_encrypt));

        }


        $sales = [
            'email' =>request('email_id'),
            'full_name' =>request('full_name'),
            'company_name' =>request('company_name'),
            'mobile_no' =>request('mobile_no'),
            'query' =>request('quer'),
            'created_at' => $created_at 

        ];
        $client = [
            'name' => request('full_name'),
            'time' => Carbon::now()->timestamp,
            'info' => 'Laravel',
            'email' => request('email_id'),
            'office_no' => '(+91) 976 9543 488',
            'support_email' =>'support@dquip.com',
            'website' => 'http://dquiplaravel.mycrmserver.com/',
            'timing' => 'Mon to Fri - 10 am to 6 pm (IST)',
            'skype' =>'dquip.crm'
    
        ];
        // \Mail::to('sales@gmail.com')->send(new \App\Mail\SalesMail($sales));
        // \Mail::to($client['email'])->send(new \App\Mail\ClientMail($client));

        return redirect('main_page')->with('status', 'Form Data Has Been inserted ');
    }
    public function download(Request $request)
    {
        
        $messages=
        [
            "full_name.required"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed. ",
            "full_name.max"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",
            "full_name.regex"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",

            "mobile_no.required" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.max" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.min" => "The Mobile Number Must be between 10 to 15 Digits",

            "email_id.required"=>"Please enter valid email id.",
            "email_id.email"=>"Please enter valid email id.",

            "ip_ack.accepted"=>"Please accept the ip monitoring checkbox",

            "terms_ack.accepted"=>"Please accept the privacy policy & term of use checkbox.",


        ];

        $rules = [
            'full_name' => 'required|max:35|regex:/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/',
            'mobile_no' => 'required|min:10|max:15',
            'email_id'=>'email:rfc,dns',
            'ip_ack' => 'accepted',
            'terms_ack' => 'accepted'
        ];

        $validate =  Validator::make($request->all(),$rules,$messages);
 

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        // $show = Enquiry::create($validate);


        $full_name = $request->full_name;
        $email_id = $request->email_id;

        $username_encrypt = Crypt::encrypt( $request->email_id);
        $username_shorten = substr(($request->email_id),0,5).''.'************';

        $mobile_no = $request->mobile_no;
        // $ip_address = request()->ip();
        $ip_address = $this->getIp(); 
        $page_path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $browser_details = request()->userAgent();
        $created_at = Carbon::now()->toDateTimeString();
        $industry_name = $request->industry;
        // $industry_id = $request ->industry;
        // $industry_id = DB::select('call ViewIndustryID(?)',array($industry));
        $industrys = DB::select("call ViewIndustryID('$industry_name')");

        $myStr = $request->mobile_no;
        $contact_length = strlen($myStr);
        $star ="***************";

        $mobile_shorten = substr($myStr, 0, 5) . substr($star,5,$contact_length-5);
        $encrypted_contact_no = encrypt($request->mobile_no);

        
        // $updated_at = Carbon::now()->toDateTimeString();
        foreach($industrys as $industry){
        DB::select('call InsertDownload(?,?,?,?,?,?,?,?,?,?,?,?)',array($full_name ,$email_id ,$mobile_no  ,$ip_address ,$page_path ,$browser_details ,$created_at ,$industry->industry_id,$mobile_shorten,$encrypted_contact_no,$username_shorten,$username_encrypt));
        }
        // $sales = [
        //     'email' =>request('email_id'),
        //     'full_name' =>request('full_name'),
        //     'mobile_no' =>request('mobile_no'),
        //     'query' =>request('quer'),
        // ];
        // $client = [
        //     'name' => request('full_name'),
        //     'time' => Carbon::now()->timestamp,
        //     'info' => 'Laravel',
        //     'email' => request('email_id'),
        //     'office_no' => '(+91) 976 9543 488',
        //     'support_email' =>'support@dquip.com',
        //     'website' => 'http://dquiplaravel.mycrmserver.com/',
        //     'timing' => 'Mon to Fri - 10 am to 6 pm (IST)',
        //     'skype' =>'dquip.crm'
    
        // ];
        // \Mail::to('sales@gmail.com')->send(new \App\Mail\SalesMail($sales));
        // \Mail::to($client['email'])->send(new \App\Mail\ClientMail($client));

        return redirect('main_page')->with('status', 'Form Data Has Been inserted');
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
