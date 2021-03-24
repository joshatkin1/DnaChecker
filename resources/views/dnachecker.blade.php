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

<form action="/test/dnachecker/run" method="GET" enctype="application/x-www-form-urlencoded">
    @csrf
    <button class="sml-btn run-test" type="submit" alt="dna checker submit button">run dna checker test</button>
</form>

<pre>/*Question:

    DNA Coding

    Develop a small Ruby app do solve the following.

    input file: dna.in

    output file: dna.out

    A biologist has extracted some genetic material. We must help the biologist check the sequences of bases from the
    extracted chromosomes. The bases are adenine (A), thymine (T), cytosine (C) and guanine (G). We are looking for a certain set of genetic sequences.
    Your program should read in strings representing genetic sequences and determine if the sequence match.
    The genetic sequences relate to a small creature and adhere to the rules below:

    The sequence has a single chromosome that codes for a HEAD followed by one or more BODY SEGMENTs.

    A HEAD consists of a GLOBE followed by one or more EYE SPOTs.

    A BODY SEGMENT consists of a GLOBE followed by one or more LEGs.

    The DNA sequence for a GLOBE has the following structure:

    - It starts with one or more As. The number of As determines the size of the GLOBE.
    - The As are followed by either CAT or TAC.
    - The GLOBE sequence is terminated by a single A.

    So AATACA and ACATA are valid GLOBEs, while ATCAA and ACAT are not valid GLOBEs.


    The DNA sequence for an EYE SPOT has the following structure:

    - The first base is T.
    - The EYE SPOT may or may not be on a stalk. a. If the EYE SPOT is on a stalk, the strand continues
    with the code for one or more LEGs. The number of LEGS determines the length of the stalk. b.
    If the eye spot is not on a stalk, the strand continues with the terminators.
    - The sequence for an EYE SPOT is terminated with AG.

    So TAG and TCGGTCGTAG are valid GLOBES EYE SPOTs, while CGTAG and TAAG are not valid EYE SPOTs.


    The DNA sequence for a LEG has the following structure:

    - The first base is C.
    - The initial C is followed by one or more Gs. The number of Gs determines the length of the LEG.
    - The LEG sequence is terminated by a single T.

    So CGGGGGGT and CGT are valid LEGs, while CGGG and CCCGT are not valid LEGs.


    For all sequences, there can be no bases in the sequence other than those specified. For example,
    the sequence CAGATA is not a valid LEG even though it contains CGT, because it has the extra A bases.

    Input:

    The first line contains an integer n, where 1 ~ n ~ 100, telling how many chromosomes are represented.
    The next n lines each contain a string of 1 to 100 uppercase alphabetic characters representing one chromosome.
    Only the characters 'A', 'T', 'C', and 'G' will be on chromosome lines.

    Output:

    The first line of output should read DNS OUTPUT. Each of the next n lines should consist of the case number
    followed by either YES or NO depending on whether or not the corresponding input line matches.
    The last line of output should read END OF OUTPUT.

    Sample Input:

    3
    ACATATAGACATACGT
    AAAAAATACATAGTAGTCGGGTAG
    ATACATCGGGTAGCGT

    Sample Output (corresponding to sample input):

    DNA OUTPUT
    Case 1: YES
    Case 2: NO
    Case 3: NO
    END OF OUTPUT*/</pre>

</body>
</html>
