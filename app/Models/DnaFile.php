<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class DnaFile extends Model
{
    protected $allowedFileExtensions = ["txt", "pdf", ".doc"];

    public function uploadFile($file){
        if(in_array($file->extension(), $this->allowedFileExtensions)){
            return $file->storeAs('/public', 'dnain.txt');
        }else{
            throw new ExtensionFileException("We only accept .txt, .pdf and .doc files. please export as different file and try again.");
        }
    }

    public function downloadPublicFile($filename){
        $storage = new Storage();
        $downloadFileUrl = '/public/' . $filename;
        if($storage::exists($downloadFileUrl)){
            return $storage::download($downloadFileUrl);
        }else{
            throw new FileNotFoundException("This file does not exist, please upload a dna file on previous page");
        }
    }
}
