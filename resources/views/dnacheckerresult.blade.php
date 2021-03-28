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
<h1>DNA Results</h1>
<br>

<p>File Output</p>

@isset($output_file_content)
    <pre>
    {{$output_file_content}}
    </pre>
@endisset
<br>

<a href="/dnachecker" class="sml-btn run-test" style="background-color:gray;" type="button" alt="download dna results output file">back to previous page</a>
<a download href="/dnachecker/results/file/download" style="background-color:green;" class="sml-btn run-test" type="button" alt="download dna results output file">download results file</a>

</body>
