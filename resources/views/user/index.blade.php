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
    <link 
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    rel="stylesheet" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
    crossorigin="anonymous">
    <title>List User</title>
</head>

<body class="antialiased">
    <div class = "container">
        <form action="/users/search" method="POST">
        @csrf
            <label for="name">Search by Name:</label>
            <input type="text" id="name" name="name">
            <label for="posts">Search by number of posts:</label>
            <input type="text" id="posts" name="posts">
            <label for="comments">Search by number of comments:</label>
            <input type="text" id="comments" name="comments">
            <button type="submit" class="btn-warning">Search</button>
        </form>
    </div>
    <div class=".container-md" style="margin: 50px 10% ;">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">@sortablelink('name','Name')</th>
                    <th scope="col">@sortablelink('age','Age')</th>
                    <th scope="col">Email</th>
                    <th scope="col">BirthDay</th>
                    <th scope="col">Number of comments</th>
                    <th scope="col">Number of posts</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userList as $user)
                    <TR>
                        <TD>{{$user->id}}</TD>
                        <TD><img src="{{URL::to($user->avatar)}}" alt="avatar" class="img-fluid"></TD>
                        <TD><a href="/users/{{$user->id}}/posts">{{$user->name}}</a></TD>
                        <TD>{{$user->age}}</TD>
                        <TD>{{$user->email}}</TD>
                        <TD>{{$user->birthday}}</TD>
                        <TD class="text-center"><a href="/users/{{$user->id}}/comments">{{$user->comments_count}}</a></TD>
                        <TD class="text-center"><a href="/users/{{$user->id}}/posts">{{$user->posts_count}}</a></TD>
                        <TD>
                            <a href="/users/{{$user->id}}/comments"><button class="btn-primary">Show Comment</button></a>
                            <a href="/users/{{$user->id}}"><button class="btn-info">Show Detail</button></a>
                        </TD>
                    </TR>
                @endforeach
            </tbody>
        </table>
        @if(Route::current()->getName() == 'users.index')
        {!! $userList->links() !!}
        @endif
    </div>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
@endsection