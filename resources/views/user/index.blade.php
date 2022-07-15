@extends('layouts.app')

@section('content')
<html lang="en">
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>List User</title>
</head>

<body class="antialiased">
    <div class = "container">
        @extends('user.editModal')
        @extends('user.deleteConfirm')
        @extends('user.addModal')

        <button type="button" id="btn-add" class="btn btn-success" data-toggle="modal" data-target="#Modal-add">Add new user</button>
        <form action="/users/search" method="POST">
        @csrf
            <div class="form-group" >
                <label for="name">Search by Name:</label>
                <input class="form-control" type="text" id="search-name" name="name">   
            </div>
            <div class="form-group" >
            <label for="posts">Search by number of posts:</label>
            <input class="form-control" type="number" id="posts" name="posts"> 
            </div>
            <div class="form-group" >
            <label  for="comments">Search by number of comments:</label>
            <input class="form-control" type="number" id="comments" name="comments"> 
            </div>
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
                    <th scope="col">View</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userList as $user)
                    <TR class="data-row">
                        <TD class='id'>{{$user->id}}</TD>
                        <TD><img src="{{URL::to($user->avatar)}}" alt="avatar" class="img-fluid"></TD>
                        <TD class ='name'><a href="/users/{{$user->id}}/posts">{{$user->name}}</a></TD>
                        <TD class ='age'>{{$user->age}}</TD>
                        <TD class ='email'>{{$user->email}}</TD>
                        <TD class ='birthday'>{{$user->birthday}}</TD>
                        <TD class="text-center"><a href="/users/{{$user->id}}/comments">{{$user->comments_count}}</a></TD>
                        <TD class="text-center"><a href="/users/{{$user->id}}/posts">{{$user->posts_count}}</a></TD>
                        <TD>
                            <a href="/users/{{$user->id}}/comments"><button class="btn-primary">Show Comment</button></a>
                            <a href="/users/{{$user->id}}"><button class="btn-info">Show Detail</button></a>
                        </TD>
                        <TD>
                            <button type="button" id="btn-edit" class="btn btn-success" data-toggle="modal" data-item-id="{{$user->id}}" data-target="#Modal-edit">Edit</button>
                            <button type="button" id="btn-delete" class="btn btn-warning" data-toggle="modal" data-item-id="{{$user->id}}" data-target="#Modal-delete">Delete</button>
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
</html>
@endsection