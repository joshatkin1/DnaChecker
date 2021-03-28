<?php

namespace App\Models;

use App\Interfaces\DnaCheckerInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\UnreadableFileException;


class DnaChecker extends Model implements DnaCheckerInterface
{
    protected $storage_url = 'public/';
    protected $dna_in_file;
    protected $valid_sequence = '/((^A{1,}(CAT|TAC){1}A{1}){1}(T{1}(C{1}G{1,}T{1})*(AG){1}){1,}){1}((A{1,}(CAT|TAC){1}A{1}){1}(C{1}G{1,}T{1}){1,}){1,}/';

    final public function getDnaInputFileContents()
    {

        if (!Storage::exists($this->storage_url . 'dnain.txt')) {
            throw new FileNotFoundException($this->storage_url);
        } else {
            return $this->dna_in_file = explode("\n", Storage::get($this->storage_url . 'dnain.txt'));
        }
    }

    final public function removeDnaInputFileEmptyLines(){
        for($i = 0; $i < count($this->dna_in_file); $i++){
            if($this->dna_in_file[$i] === ""){
                array_splice($this->dna_in_file, $i,1);
            }
        }
        return true;
    }

    final public function checkDnaFileFormat()
    {
        $file = $this->dna_in_file;

        if (!is_numeric($file[0])
            || !is_string($file[1])) {
            throw new UnreadableFileException('File is not formatted correctly, please read test instructions.');
        }

        return true;
    }

    final public function generateDnaFileResultsContent()
    {
        Storage::put($this->storage_url . 'dnaout.txt',"DNA OUTPUT <br>");

        $file = $this->dna_in_file;

        for ($i = 1; $i < count($file);$i++){

        //LOOP THROUGH FILE CONTENTS ARRAY AND PASS TO checkDnaSequenceIsValid() function to determine if valid chromose

            if($this->checkDnaSequenceIsValid($file[$i])){
                $line_output = "Case " . $i . ":" . " Yes <br>";
            }else{
                $line_output = "Case " . $i . ":" . " No <br>";
            }

            Storage::append($this->storage_url . 'dnaout.txt', $line_output);
        }

        Storage::append($this->storage_url . 'dnaout.txt', "END OF OUTPUT*/");

        return Storage::get($this->storage_url . 'dnaout.txt');
    }

    final public function checkDnaSequenceIsValid($line){
        //LOOP THROUGH $valid_sequences array which holds all valid sequence preg_matches and test chromosome, return result

        if(preg_match($this->valid_sequence , $line)){
            return true;
        }

        return false;
    }
}
