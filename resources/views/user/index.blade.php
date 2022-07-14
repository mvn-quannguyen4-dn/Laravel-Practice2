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
    <title>List User</title>
</head>

<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">BirthDay</th>
                    <th scope="col">Number of comments</th>
                    <th scope="col">Number of posts</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < sizeof($userList); $i++)
                    <TR>
                        <TD>{{$i+1}}</TD>
                        <TD><img src="{{URL::to($userList[$i]->avatar)}}" alt="avatar" class="img-fluid"></TD>
                        <TD><a href="/users/{{$userList[$i]->id}}/posts">{{$userList[$i]->name}}</a></TD>
                        <TD>{{$userList[$i]->age}}</TD>
                        <TD>{{$userList[$i]->email}}</TD>
                        <TD>{{$userList[$i]->birthday}}</TD>
                        <TD class="text-center"><a href="/users/{{$userList[$i]->id}}/comments">{{$userList[$i]->comments_count}}</a></TD>
                        <TD class="text-center"><a href="/users/{{$userList[$i]->id}}/posts">{{$userList[$i]->posts_count}}</a></TD>
                        <TD>
                            <a href="/users/{{$userList[$i]->id}}/comments"><button class="btn-primary">Show Comment</button></a>
                            <a href="/users/{{$userList[$i]->id}}"><button class="btn-info">Show Detail</button></a>
                        </TD>
                    </TR>
                @endfor
            </tbody>
        </table>
    </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
@endsection