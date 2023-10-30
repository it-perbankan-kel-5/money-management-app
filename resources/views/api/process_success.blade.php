{{-- get access token --}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session()->has('data'))
    @foreach(session()->get('data') as $data)
        <p>{{$data['no_rekening']}}</p>
        <p>{{$data['rekening_type']}}</p>
        <p>{{$data['description']}}</p>
        <p>{{$data['alias']}}</p>
        <p>{{$data['balance']}}</p>
    @endforeach
@endif

@if(session()->has('user_token'))
    <h1> TOKEN: {{ request()->session()->get('user_token') }} </h1>
@endif

@if(session()->has('success'))
    <h2> {{ session()->get('success') }} </h2>
@endif
</body>
</html>


