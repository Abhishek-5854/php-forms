<!DOCTYPE html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
        <title>
            Form
        </title>
          <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/blitzer/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Option 1: Include in HTML -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
<body>

<div class="container">

    <form class="well form-horizontal" action="/send" method="POST"  id="contact_form">
      @csrf
<fieldset>

<!-- Form Name -->
<legend>30 days Free CRM Software Mock Demo</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Full Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="full_name" placeholder="Full Name" class="form-control"  type="text">
    </div>
    <span class="text-danger">
      @error('full_name')
      {{$message}}
      @enderror
  </span>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Comapny Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="company_name" placeholder="Company Name" class="form-control"  type="text">
    </div>
    <span class="text-danger">
      @error('company_name')
      {{$message}}
      @enderror
  </span>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="username" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
    <span class="text-danger">
      @error('username')
      {{$message}}
      @enderror
  </span>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Password</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="bi bi-lock-fill"></i></span>
  <input name="password" placeholder="password" class="form-control"  type="password">
    </div>
    <span class="text-danger">
      @error('password')
      {{$message}}
      @enderror
    </span>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Mobile #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_number" placeholder="(845)555-1212" class="form-control" type="text">
    </div>
    <span class="text-danger">
      @error('contact_number')
      {{$message}}
      @enderror
    </span>
  </div>
</div>


<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Select Industry</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              
    <select name="industry_id" class="form-control">
      @foreach($datas as $data)
      <option value="{{$data->industry_id}}">{{$data->industry_name}}</option>
      @endforeach
    </select>
    
  </div>
  <span class="text-danger">
    @error('indusrty_id')
    {{$message}}
    @enderror
</span>
</div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label">Select Demo Date / Time Slot (IST)</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="bi bi-calendar-event-fill"></i></span>
        <input name="scheduled_date" id="DisableWKEnds" placeholder="MM/DD/YYYY" class="form-control"  type="text">
      </div>
      <span class="text-danger">
        @error('scheduled_date')
        {{$message}}
        @enderror
    </span>
    </div>
  </div>

  <div class="form-group"> 
    <label class="col-md-4 control-label">Select Timeslot</label>
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <select name="scheduled_time_slot_id" class="form-control selectpicker" aria-label="Default select example">
          <option selected>Time Slot (IST)</option>
          <option value="1">10.00 am to 10.15 am</option>
          <option value="2">10.15 am to 10.30 am</option>
          <option value="3">10.30 am to 10.45 am</option>
        </select>
        <span class="text-danger">
          @error('scheduled_time_slot_id')
          {{$message}}
          @enderror
        </span>
        </div>
      </div>
      </div>

    <div class="form-check d-flex justify-content-left mb-5">
      <input class="form-check-input me-2" name="checkbox1" type="checkbox" id="form2Example3cg" />
      <label class="form-check-label" for="form2Example3g">
        I want a guided demo also
      </label>
      <span class="text-danger">
        @error('checkbox1')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-check d-flex justify-content-left mb-5">
      <input class="form-check-input me-2" name="checkbox2" type="checkbox"  id="form2Example3cg" />
      <label class="form-check-label" for="form2Example3g">
        I acknowledge that IP address and Email address are being logged for monitoring purpose
      </label>
      <span class="text-danger">
        @error('checkbox2')
        {{$message}}
        @enderror
      </span>
    </div>

    <div class="form-check d-flex justify-content-left mb-5">
      <input class="form-check-input me-2" name="checkbox3" type="checkbox" id="form2Example3cg" />
      <label class="form-check-label" for="form2Example3g">
        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
      </label>


      <span class="text-danger">
        @error('checkbox3')
        {{$message}}
        @enderror
      </span>
    </div>
    

<!-- Success message -->
@if(session()->get('success'))
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>
@endif

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div><!-- /.container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

{{-- External js --}}
<script src={{asset('js/main.js')}}></script>

</body>
</html>