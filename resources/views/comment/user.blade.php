@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
    <title>User profile</title>
</head>

<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
    <h1>{{$user->name}}'s Info: </h1>
    <div>
        <p><img src="{{URL::to($user->avatar)}}" alt=""></p>
        <p>Name: <span class="text-primary">{{$user->name}}</span></p>
        <p>Age: <span class="text-primary">{{$user->age}}</span></p>
        <p>Email: <span class="text-primary">{{$user->email}}</span></p>
        <p>Birthday: <span class="text-primary">{{$user->birthday}}</span></p>
        <p>Address: <span class="text-primary">{{$user->profile->address}}</span></p>
        <p>Phone Number: <span class="text-primary">{{$user->profile->tel}}</span></p>
        <p>Province: <span class="text-primary">{{$user->profile->province}}</span></p>
    </div>
    </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
@endsection