<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Form;
use DB;

class FormController extends Controller {
    public function show(){
        $forms = Form::all();
        return view('form', compact('forms'));
    }

    public function ty() {
        return view('thank');
    }

    public function create(Request $request) {

        $full_name = request("full_name");
        $company_name = request("comp_name");
        $contact_number = request("mobile");
        $username = request("email");
        $scheduled_date = request("demo_date");
        $scheduled_time_slot_id = request("time_slot");
        $client_ip = request()->ip();
        $client_browser = request()->header('User-Agent');
                    
        DB::select('CALL guided_demo(?,?,?,?,?,?,?,?)',array("$full_name", "$company_name", "$contact_number", "$username", "$scheduled_date", "$scheduled_time_slot_id", "$client_ip", "$client_browser"));
        
        $request->validate([
            'demo_date' => 'required',
            'time_slot' => 'required',
            'full_name' => 'required|max:35\regex:/^[a-zA-Z][a-zA-Z]+[a-zA-Z]$/',
            'company_name' => 'required|max:35|alpha_num',
            'phone' => 'required|min:10|max:15',
            'email' => 'required|email:rfc,dns',
        ]);

        return redirect('/thank');
    }
}



