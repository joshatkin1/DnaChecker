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
<h1>Task 2</h1>

<p>please insert DNA file below using the following format stated.</p>
<pre>
    3
    ACATATAGACATACGT
    AAAAAATACATAGTAGTCGGGTAG
    ATACATCGGGTAGCGT
</pre>
<br>
<form class="dnafileuploadform" action="dnachecker/file/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input name="file" type="file" alt="insert dna file" required>
    <small>allowed file extensions (".txt", ".pdf", ".doc")</small>
    <br>
    <button class="sml-btn run-test" type="submit" alt="dna checker submit button">upload Dna file</button>
    @isset($uploaded)
        <small style="color:green;">file uploaded successfully.</small>
    @endisset
</form>
<form action="dnachecker/run" method="GET" enctype="application/x-www-form-urlencoded">
    @csrf
    <button class="sml-btn run-test" type="submit" alt="dna checker submit button">run dna checker test</button>
</form>
