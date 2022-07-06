<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     .form-group{ 
     
      padding: 20px;
}
    </style>
   
 
</head>
<body>
<form action="" method="POST">
  @csrf 
  
  <div class="form-group" >
    <label for="exampleFormControlInput1">No. of Users</label>
    <input  type ="integer" name="number_of_users"class="form-control" id="exampleFormControlInput1" >
    <div style="color:red;">@error('number_of_users'){{$message}} @enderror </div>
  </div>
 

  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
  <label class="form-check-label" for="exampleRadios1">
  <u>On Cloud</u> Plan starts at <u>10 Users</u> onwards
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
  <u>On Your Online Server</u> Plan starts at <u>30 Users</u> onwards

  </label>
  <div style="color:red;">@error('exampleRadios'){{$message}} @enderror </div>
</div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Full name</label>
    <input type="text" name="full_name"class="form-control" id="exampleFormControlInput1" >
    <div style="color:red;">@error('full_name'){{$message}} @enderror</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Mobile No.</label>
    <input  class="form-control" name="contact_number"id="exampleFormControlInput1" >
    <div style="color:red;">@error('contact_number'){{$message}} @enderror </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="username" class="form-control" id="exampleFormControlInput1" >
    <div style="color:red;">@error('username'){{$message}} @enderror </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Company Name</label>
    <input  type="text" name="companyname"class="companyname" id="exampleFormControlInput1" >
    <div style="color:red;">@error('companyname'){{$message}} @enderror </div>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Query</label>
    <textarea name="enquiryquery" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

<div class="form-check">
  <input class="form-check-input" name="ip" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    
I acknowledge that IP address and Email address are being logged for monitoring purpose.
  </label>
  <div style="color:red;">@error('ip'){{$message}} @enderror </div>
</div>
<div class="form-check">
  <input class="form-check-input" name="terms"type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
  
I have read and I agree to the privacy policy & terms of use
  </label>
  <div style="color:red;">@error('terms'){{$message}} @enderror </div>
</div>
<div>
  <input type="submit" value="Get Quote">
</body>
</html>
