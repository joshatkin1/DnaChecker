<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" />
</head>
<body class="antialiased">
<h1>Error !</h1>
<p>read error below and then please try again.</p>
<br/>
{{$errors}}
</body>
</html>
