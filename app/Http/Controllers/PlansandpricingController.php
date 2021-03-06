<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\free_trial_user;
use DB;

class PlansandpricingController extends Controller
{
    function showdata(Request $req){
        //print_r('get method');
       $validate=$req->validate([
        'number_of_users'=> 'required|integer',
        'full_name'=>'required|max:35\regex:/^[a-zA-Z][a-zA-Z]+[a-zA-Z]$/',
        'contact_number'=>'required|min:10|max:15',
        'username'=>'required|email:rfc,dns',
        'companyname'=>'required|max:35|alpha_num',
        'ip'=>'accepted',
        'terms'=>'accepted'

       ],
   [   'number_of_users.required'=>'Please enter number of users.' ,
   'full_name.required'=>'Please enter full name.',
   'contact_number.required'=>'Please enter a mobile number.',
   'username.required'=>'Please enter an email address.',
   'companyname.required'=>'Please enter a company name.',
   'ip.accepted'=>'Please select the checkbox.',
   'terms.accepted'=>'Please check terms & condition, privacy policy & term of use checkbox.'
   
]
);

        $number_of_users=$req->number_of_users;
        $full_name=$req->full_name;
        $contact_number=$req->contact_number;
        $username=$req->username;
        $companyname=$req->companyname;
        $enquiryquery=$req->enquiryquery;
        $industry_name = $req->industry;
        $username_shorten = substr(($req->username),0,5).''.'************';
        $encrypted_contact_no = encrypt($req->contact_number);
        $username_encrypt = Crypt::encrypt( $req->username);
        $contact_length = strlen($contact_number);
        $star ="***************";
        $contact_shorten = substr($contact_number, 0, 5) . substr($star,5,$contact_length-5);
        $client_ip = request()->ip();
        $client_browser = request()->header('User-Agent');
        $industrys = DB::select("call ViewIndustryID('$industry_name')");
        //$p=new free_trial_user;
       // $p->full_name =$full_name;
        //$p->save();
        
  
        
        foreach($industrys as $industry){
            DB::select(
                'CALL insertvalue(?,?,?,?,?,?,?,?,?,?,?,?,?)',array($number_of_users,$full_name,$contact_number,$username,$companyname,$enquiryquery,$industry->industry_id,$client_ip,$client_browser,$contact_shorten, $encrypted_contact_no, $username_shorten, $username_encrypt)
                );
        }
 
        return redirect('main_page')->with('status', 'Form Data Has Been inserted ');

    }


    function showform($industry_name){
        //print_r('post method');
        return view('plans and pricing', compact('industry_name'));
    }
}
