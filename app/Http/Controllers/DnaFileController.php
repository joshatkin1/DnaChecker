<?php

namespace App\Http\Controllers;

use App\Models\DnaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class DnaFileController extends Controller
{
    final public function dnaFileUpload(Request $request){
        $uploadedFile = $request->file('file');
        $file = new DnaFile();
        try {
            $file->uploadFile($uploadedFile);
            return Redirect::to('dnachecker')->with('uploaded', 'true');
        }catch(ExtensionFileException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }

    final public function dnaOutputFileDownload(Request $request){
        $file = new DnaFile();
        try{
            return $file->downloadPublicFile('dnaout.txt');
        }catch(FileNotFoundException $exception){
            return view('exception', ['errors' => $exception->getMessage()]);
        }
    }
}
