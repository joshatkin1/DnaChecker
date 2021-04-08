<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;
use App\Interfaces\DnaCheckerInterface;

class DnaFileController extends Controller
{
     public function dnaFileUpload(Request $request, DnaCheckerInterface $file){
        $uploadedFile = $request->file('file');
        try {
            $file->uploadFile($uploadedFile);
            return Redirect::to('dnachecker')->with('uploaded', 'true');
        }catch(ExtensionFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }

    public function dnaOutputFileDownload(Request $request, DnaCheckerInterface $file){
        try{
            return $file->downloadPublicFile('dnaout.txt');
        }catch(FileNotFoundException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }
}
