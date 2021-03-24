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
    <p>please see links to tech tests below (please excuse the lack of styling).</p>
        <ul>
            <li><a href="/test/button">task 1: button</a></li>
            <li><a href="/test/dnachecker">task 2: dnachecker</a></li>
        </ul>
    </body>
</html>
