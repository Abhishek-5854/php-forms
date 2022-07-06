<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        table, th, td {
        border: 1px solid;
        }
    </style>

</head>
<body>
@if(session()->get('status'))
        <div class="alert alert-success">
        {{ session()->get('status') }}  
        </div><br />
@endif
    <div class="uper">

    <table class="table table-striped">
        <thead>
            <tr>
            <td>Industry Name</td>
            <td >Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($shows as $show)
            <tr>
                <td>{{$show->industry_name}}</td>
                <td><a href="{{ url($show->industry_name) }}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
