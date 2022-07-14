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
    <title>List User's Comments</title>
</head>

<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Content</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0; $i < sizeof($user->comments); $i++)
                    <TR>
                        <TD>{{$i+1}}</TD>
                        <TD>{{\Illuminate\Support\Str::limit($user->comments[$i]->content, 100, $end='...')}}</TD>
                        <TD>{{$user->comments[$i]->created_at}}</TD>
                        <TD>
                            <a href="/comments/{{$user->comments[$i]->id}}/users"><button class="btn-primary">Show User</button></a>
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