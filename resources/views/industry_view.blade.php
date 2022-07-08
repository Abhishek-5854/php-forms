<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif
    <div class="jumbotron text-center">
    <h1 class="display-3">Select below options</h1>
    <!-- <p class="lead"><strong>Please check your email</strong> to get details about the enquiry </p> -->
    <hr>

        <a href="{{ url("demo-form") }}" class="btn btn-primary"> Free 30 day Demo</a>
        <a href="{{ url("guided-demo") }}" class="btn btn-primary"> Guided Demo</a>
        <a href="" class="btn btn-primary"> Plans and Pricing</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">
        Enquiry Form
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-4">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                    Enquiry Form 
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="enquiry-form" accept-charset="utf-8" autocomplete="off">
                    @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" required="" pattern="[a-zA-Z'-'\s]*" maxlength="35" autocomplete="off">
                        <br>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="form-control" required=""  maxlength="100" autocomplete="off">
                        <br>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" id="email_id" name="email_id" class="form-control" required="" autocomplete="off">
                        <br>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Mobile No</label>
                        <input type="number" id="mobile_no" name="mobile_no" class="form-control" required="" maxlength="15" minlength="10" autocomplete="off">
                        <br>
                        </div>
                        <input type = "hidden" name ="industry" value = "{{$industry_name}}" />
                        <div class="form-group">
                        <label for="exampleInputEmail1">Query</label>
                        <textarea name="quer" id="quer" class="form-control" required="" maxlength="2000" autofocus autocomplete="off"> </textarea>
                        <br>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="ip_ack" >
                            <label class="form-check-label" for="flexCheckDefault" >
                            I acknowledge that IP address and Email address are being logged for monitoring purpose
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="terms_ack">
                            <label class="form-check-label" for="flexCheckDefault" >
                            I have read and I agree to the 
                            <a href="http://dquiplaravel.mycrmserver.com/privacy-policy">privacy policy</a> & 
                            <a href="http://dquiplaravel.mycrmserver.com/terms-of-use">terms of use</a>
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    </div>
                </div>
                </div> 
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal5">
        Download 
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Download</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-4">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                    Download Form 
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="download-form" accept-charset="utf-8" autocomplete="off">
                    @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" required="" pattern="[a-zA-Z'-'\s]*" maxlength="35" autocomplete="off">
                        <br>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" id="email_id" name="email_id" class="form-control" required="" autocomplete="off">
                        <br>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Mobile No</label>
                        <input type="number" id="mobile_no" name="mobile_no" class="form-control" required="" maxlength="15" minlength="10" autocomplete="off">
                        <br>
                        </div>
                        <input type = "hidden" name ="industry" value = "{{$industry_name}}" />
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="ip_ack" >
                            <label class="form-check-label" for="flexCheckDefault" >
                            I acknowledge that IP address and Email address are being logged for monitoring purpose
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="terms_ack">
                            <label class="form-check-label" for="flexCheckDefault" >
                            I have read and I agree to the 
                            <a href="http://dquiplaravel.mycrmserver.com/privacy-policy">privacy policy</a> & 
                            <a href="http://dquiplaravel.mycrmserver.com/terms-of-use">terms of use</a>
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    </div>
                </div>
                </div> 
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
        </div>
        
    </div>
</body>
</html>