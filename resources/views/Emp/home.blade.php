<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Wlcome to website:
        {{$user['emp_name'] ?? ''}}
        <a href="{{route('emplogout')}}">Logout</a>
        <a href="{{route('employee.show',$user['emp_id'])}}">View Profile</a>
    </h1>
</body>
</html>