<?php

namespace App\Interfaces;

interface DnaCheckerInterface
{
    public function getDnaInputFileContents();

    public function removeDnaInputFileEmptyLines();

    public function checkDnaFileFormat();

    public function generateDnaFileResultsContent();

    public function checkDnaSequenceIsValid($line);
}
